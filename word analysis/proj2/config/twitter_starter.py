from config.config import swf_client
import uuid

response=swf_client.start_workflow_execution(
    domain='TKMCE',
    workflowId=str(uuid.uuid4()),
    workflowType={
        'name':'Twitter',
        'version':'2.0'
        },
    tasklist={'name':'twitter'
              },
    input=''
)
print(response)
