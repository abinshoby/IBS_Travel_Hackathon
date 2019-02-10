from paralleldots import keywords
from paralleldots import set_api_key
from paralleldots import taxonomy

set_api_key("l0gClHlNjmAovHKVzHsxfSRMmPw6FcAljMCm6QZFoOI")
keyw=keywords(" Hyderabad ")
max=0;
keyword1=[]
#ir=keyw['keywords']
#for keydic in ir:
	#for eachk in keydic:
		#if(eachk!="confidence_score"):
			#keyword1.append(keydic[eachk])
			
place=""
keyword1=(" is a place").split()
#print(keyword1)
for k in keyword1:
	clas=taxonomy(k)
	d=clas["taxonomy"]
	#print(clas)
	for e in d:
		if(e['tag']=='places' and e['confidence_score']>max):
			place=k
			max=e['confidence_score']
print (place)