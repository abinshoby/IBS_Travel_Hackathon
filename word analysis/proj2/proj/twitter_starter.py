import boto3
import uuid

client = boto3.client(
    'swf',
    aws_access_key_id='AKIAIU6QBL4CZAUQ4TPA',
    aws_secret_access_key='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'
)

response = client.start_workflow_execution(
    domain='TKMCE',
    workflowId=str(uuid.uuid4()),
    workflowType={
        'name':'Twitter',
        'version':'2.0'
    },
    taskList={
        'name':'twitter'
    },
    input=''
)

print "Workflow Request : ", response