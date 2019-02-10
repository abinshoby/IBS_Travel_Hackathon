import boto3
import json
import uuid
from collections import Counter
s3 = client = boto3.client(
    's3',
    aws_access_key_id='AKIAIU6QBL4CZAUQ4TPA',
    aws_secret_access_key='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'
)

def store_activity(id):
    files = json.loads(id)
    counter = Counter()
    for file in files:
        response = s3.get_object(
            Bucket='tkmce-chunks',
            Key=file
        )
        word_frequency = json.loads(response['Body'].read())
        word_frequency_map = {}
        for word in word_frequency:
            word_frequency_map[word['word']] = word['count']
        counter = counter + Counter(word_frequency_map)

    print counter.most_common(10)

    frequent = list(map(convert, counter.most_common(200)))
    key = str(uuid.uuid4())
    s3.put_object(
        Bucket='tkmce-chunks',
        Body=json.dumps(frequent),
        Key='output',
        ACL='public-read',
        ContentType='application/json'
    )
    return "success"

def convert(x):
    a = {}
    a['word'], a['count'] = x
    return a


if __name__ == '__main__':
    store_activity('["0d3d6173-b6a1-43ef-b40b-d4e4629722fa"]')