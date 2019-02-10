from config.config import swf_client
import uuid
worker_id=str(uuid.uuid())
print("worker id",worker_id)
while True:
    task=swf_client.poll_for_activity_task(
        domain='TKMCE',
        taskList={
            'name':'twitter'
            },
        identity=worker_id
        )

if 'taskToken' not in task:
    print('Repolling!.....'
          else:
          print(task)
          print"Activityname",task['activityType'
