import boto3
import json
import uuid
from collections import Counter
import re

s3 = client = boto3.client(
    's3',
    aws_access_key_id='AKIAIU6QBL4CZAUQ4TPA',
    aws_secret_access_key='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'
)

stopwords = []

f = open('stop_words.txt','r')
stopwords = [word.strip() for word in f.readlines()]

def remove_stopwords(sentence):
    sen = [word.lower() for word in re.sub("[^\w]", " ", sentence).split() if word.lower() not in stopwords]
    return sen

def processActivity(id):
    response = s3.get_object(
        Bucket='tkmce-chunks',
        Key=id
    )

    total_word = []

    lines = json.loads(response['Body'].read())
    for line in lines:
        words = remove_stopwords(line)
        total_word = total_word + words

    frequent = list(map(convert, Counter(total_word).most_common(200)))
    key = str(uuid.uuid4())
    s3.put_object(
        Bucket='tkmce-chunks',
        Body=json.dumps(frequent),
        Key=key
    )
    return key

def convert(x):
    a = {}
    a['word'], a['count'] = x
    return a

if __name__ == '__main__':
    print processActivity('1032404d-cdf1-43a2-934f-83757dfd4514')