import boto3
from botocore.config import Config

config = Config(region_name='us-west-2', connect_timeout=50, read_timeout=70)
swf_client = boto3.client(
    'swf',
    aws_access_key_id='AKIAIU6QBL4CZAUQ4TPA',
    aws_secret_access_key='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',
    config=config
)

s3_client = boto3.client(
    's3',
    aws_access_key_id='AKIAIU6QBL4CZAUQ4TPA',
    aws_secret_access_key='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'
)