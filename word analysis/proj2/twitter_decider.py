import boto3
from botocore.client import Config
import uuid
import json

config = Config(region_name='us-west-2', connect_timeout=50, read_timeout=70)
client = boto3.client(
    'swf',
    aws_access_key_id='AKIAIU6QBL4CZAUQ4TPA',
    aws_secret_access_key='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',
    config=config
)

def get_activity_type(task, lastEvent):
    schedule_event = task['events'][lastEvent['activityTaskCompletedEventAttributes']['scheduledEventId'] - 1]
    return schedule_event['activityTaskScheduledEventAttributes']['activityType']['name']

while True:
    task = client.poll_for_decision_task(
        domain='TKMCE',
        taskList={
            'name':'twitter'
        },
        identity='decider-1',
        reverseOrder=False
    )

    if 'taskToken' not in task:
        print ("Poll timed out, no new task.  Repoll")

    elif 'events' in task:
        eventHistory = [evt for evt in task['events'] if not evt['eventType'].startswith('Decision')]
        activityCompleteEvents = [evt for evt in task['events'] if evt['eventType'] == 'ActivityTaskCompleted']
        lastEvent = eventHistory[-1]
        print (lastEvent)
        if lastEvent['eventType'] == 'ActivityTaskCompleted':
            activity = get_activity_type(task, lastEvent)
            print (activity)
            if activity == 'ChunkActivity':
                uuids = json.loads(lastEvent['activityTaskCompletedEventAttributes']['result'])
                decisions = []
                for id in uuids:
                    decisions.append(
                        {
                            'decisionType': 'ScheduleActivityTask',
                            'scheduleActivityTaskDecisionAttributes': {
                                'activityType': {
                                    'name': 'ProcessActivity',
                                    'version': '1.0'
                                },
                                'activityId': 'activity-' + str(uuid.uuid4()),
                                'input': id,
                                'taskList': {
                                    'name': 'twitter'
                                }
                            }
                        }
                    )
                client.respond_decision_task_completed(
                    taskToken=task['taskToken'],
                    decisions=decisions
                )
            elif activity == 'ProcessActivity':
                activity_counts = 0
                results = []
                for event in activityCompleteEvents:
                    activity_type = get_activity_type(task, event)
                    if activity_type == 'ChunkActivity':
                        activity_counts = len(json.loads(event['activityTaskCompletedEventAttributes']['result']))
                    elif activity_type == 'ProcessActivity':
                        print ("adding results")
                        results.append(event['activityTaskCompletedEventAttributes']['result'])

                print (results)
                print (activity_counts)
                if activity_counts == len(results):
                    client.respond_decision_task_completed(
                        taskToken=task['taskToken'],
                        decisions=[
                            {
                                'decisionType': 'ScheduleActivityTask',
                                'scheduleActivityTaskDecisionAttributes': {
                                    'activityType': {
                                        'name': 'StoreActivity',
                                        'version': '1.0'
                                    },
                                    'activityId': 'activity-' + str(uuid.uuid4()),
                                    'input': json.dumps(results),
                                    'taskList': {
                                        'name': 'twitter'
                                    }
                                }
                            }
                        ]
                    )
                else :
                    client.respond_decision_task_completed(
                        taskToken=task['taskToken']
                    )

            elif activity == 'StoreActivity':
                client.respond_decision_task_completed(
                    taskToken=task['taskToken'],
                    decisions=[
                        {
                            'decisionType':'CompleteWorkflowExecution',
                            'completeWorkflowExecutionDecisionAttributes': {
                                'result':'success'
                            }
                        }
                    ]
                )
                print ("Completed")

        elif lastEvent['eventType'] == 'WorkflowExecutionStarted':
            client.respond_decision_task_completed(
                taskToken=task['taskToken'],
                decisions=[
                    {
                        'decisionType':'ScheduleActivityTask',
                        'scheduleActivityTaskDecisionAttributes': {
                            'activityType':{
                                'name':'ChunkActivity',
                                'version':'1.0'
                            },
                            'activityId':'activity-' + str(uuid.uuid4()),
                            'input':'',
                            'taskList':{
                                'name':'twitter'
                            }
                        }
                    }
                ]

            )
