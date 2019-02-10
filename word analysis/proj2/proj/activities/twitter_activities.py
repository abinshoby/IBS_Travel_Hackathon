import boto3
from botocore.client import Config
import uuid
import ChunkActivity
import ProcessActivity
import StoreActivity

config = Config(region_name='us-west-2', connect_timeout=50, read_timeout=70)
client = boto3.client(
    'swf',
    aws_access_key_id='AKIAIU6QBL4CZAUQ4TPA',
    aws_secret_access_key='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',
    config=config
)

worker_id = str(uuid.uuid4())
print "Worker ID ", worker_id
while True:
    task = client.poll_for_activity_task(
        domain="TKMCE",
        taskList={
            'name':'twitter'
        },
        identity = worker_id
    )
    if 'taskToken' not in task:
        print "Timeout retrying!...."
    else:
        ret = "success"
        print "Starting activity"
        if task['activityType']['name'] == 'ChunkActivity':
            ret = ChunkActivity.chuckActivity()
        elif task['activityType']['name'] == 'ProcessActivity':
            ret = ProcessActivity.processActivity(task['input'])
        elif task['activityType']['name'] == 'StoreActivity':
            ret = StoreActivity.store_activity(task['input'])
        print "Completing activity"
        client.respond_activity_task_completed(
            taskToken=task['taskToken'],
            result=ret
        )
