import boto3
import json
import uuid
s3 = client = boto3.client(
    's3',
    aws_access_key_id='AKIAIU6QBL4CZAUQ4TPA',
    aws_secret_access_key='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'
)

LINES_PER_FILE = 500

def chuckActivity():
    tweets = open('twitter.txt','r')
    lines = []
    uuids = []
    print ("Opened Tweets")
    count = 0
    chunk_count = 0
    for line in tweets.readlines():
        if count == LINES_PER_FILE:
            print ("Writing to S3")
            key = str(uuid.uuid4())
            s3.put_object(
                Bucket='tkmce-chunks',
                Body=json.dumps(lines),
                Key=key
            )
            uuids.append(key)
            lines = []
            count = 0


        line = line.strip()
        if line:
            lines.append(line)
            count = count + 1

    return json.dumps(uuids)