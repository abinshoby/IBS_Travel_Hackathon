import json
import operator
from watson_developer_cloud import NaturalLanguageUnderstandingV1
from watson_developer_cloud.natural_language_understanding_v1 \
  import Features, EmotionOptions

natural_language_understanding = NaturalLanguageUnderstandingV1(
  username='3b6b1bc7-2358-40c0-83cc-121930d2748e',
  password='1nzhD4HG7zls',
  version='2017-02-27')
  

file=open("nlp.txt","r")
cont=file.read()
file.close()
response = natural_language_understanding.analyze(
  html=" \
    <html> \
      <head><title>Travel</title></head> \
      <body> \
        <h1>Travel</h1> \
        <p>"+cont+"</p> \
      </body> \
    </html>",
  features=Features(
    emotion=EmotionOptions(
      targets=['hotel','place','I'])))

#print(json.dumps(response, indent=2))
l=str(json.dumps(response, indent=2))

l=str(l.strip())
l=str(l.strip("\n"))
#print(l)
l=l[l.find("document"):]
anger=l.find("anger")
disgust=l.find("disgust")
joy=l.find("joy")
sadness=l.find("sadness")
fear=l.find("fear")
av=''
dv=''
jj=''
sv=''
fv=''
h=anger+len("anger")+3
while(True):
	if(l[h].isdigit()or l[h]=='.'):
		av+=l[h]
		h+=1
	else:
		break

h=disgust+len("disgust")+3
while(True):
	if(l[h].isdigit()or l[h]=='.'):
		dv+=l[h]
		h+=1
	else:
		break

h=joy+len("joy")+3
while(True):
	if(l[h].isdigit()or l[h]=='.'):
		jj+=l[h]
		h+=1
	else:
		break

h=sadness+len("sadness")+3
while(True):
	if(l[h].isdigit()or l[h]=='.'):
		sv+=l[h]
		h+=1
	else:
		break

h=fear+len("fear")+3
while(True):
	if(l[h].isdigit() or l[h]=='.'):
		fv+=l[h]
		h+=1
	else:
		break
#print("anger:",av,"disgust:",dv,"joy:",jj,"sadness:",sv,"fear:",fv)

av=float(av)
dv=float(dv)
sv=float(sv)
jj=float(jj)
fv=float(fv)

	

#av=float(l[anger+len("anger")+2:anger+len("anger")+9])
#dv=float(l[disgust+len("disgust")+2:disgust+len("disgust")+9])
#jj=float(l[joy+len("joy")+2:joy+len("joy")+9])
#sv=float(l[sadness+len("sadness")+2:sadness+len("sadness")+9])
#fv=float(l[fear+len("fear")+2:fear+len("fear")+9])
feeling=""
if(av>=dv and av>=jj and av>=sv and av>=fv):
	value=av
	feeling="anger"
elif(dv>=av and dv>=jj and dv>=sv and dv>=fv):
	value=dv
	feeling="disgust"
elif(jj>=av and jj>=dv and jj>=sv and jj>=fv):
	value=jj
	feeling="joy"
elif(sv>=av and sv>=dv and sv>=jj and sv >=fv):
	value=sv
	feeling="sadness"
else:
	value=fv
	feeling="fear"
print(feeling)

	







