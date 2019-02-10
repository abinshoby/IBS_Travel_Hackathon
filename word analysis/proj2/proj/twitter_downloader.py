import urllib2
import json

headers = {'Authorization': 'Bearer AAAAAAAAAAAAAAAAAAAAAKX8ywAAAAAAiM7nhDGwYZgAFK8UeS4t8QncFN4%3Dsuy1CvAoMpsEqmGkMlbBxy0GH3tp9akoYwO7FjsHKjLVZUQPP1'}

url_base = "https://api.twitter.com/1.1/search/tweets.json"
url = url_base + "?q=trump&result_type=recent&count=100"

output_file = open("twitter.txt", 'ab')

remaining = 400
while remaining > 0:
    req = urllib2.Request(url=url, headers=headers)

    response = urllib2.urlopen(req)
    remaining = response.info().getheader('X-Rate-Limit-Remaining')

    print "Remaining is " + remaining

    data = json.loads(response.read())
    count = 0
    ignored = 0
    for status in data['statuses']:
        try:
            output_file.write(status['text'].encode('utf-8'))
            count = count + 1
        except UnicodeEncodeError as e:
            ignored = ignored + 1
            continue
    print "Processed " + str(count)
    print "Ignored " + str(ignored)
    url = url_base + data['search_metadata']['next_results']

    print "Next URL " + url



