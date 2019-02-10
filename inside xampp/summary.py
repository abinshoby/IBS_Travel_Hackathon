# -*- coding: utf-8 -*-
"""
Created on Sun Sep 04 15:24:26 2016

@author: DIP
"""

from normalization import normalize_corpus, parse_document
from utils import build_feature_matrix, low_rank_svd
import numpy as np


toy_text = """
The packaging of the product is very impressive, inside the box you will get a user manual, The strap, Mi Band capsule & USB cable for charging.(Image attached).twist to display light not working all the time.
The watch is not switch off option. So the watch is all time on.
Pros:-

1) Alert for calls and messages- When you receive any calls & messages the band will vibrate so you can get to know that you have received calls & messages even if your phone is in silent mode. but the band should be connected with the phone.

* In the screen it will also show the callers name or number.

* It also gives notification for other apps also.

2) It counts your steps and calories burned, you can also set the target in the app which you want to achieve daily. The step count is very accurate.

3) It also monitors your sleep and you can even set the alarm the band vibrates very gently when you are asleep.

4) The band is waterproof and even dustproof.

5) The material of the band is excellent it does not irritate your skin even when there is water or your sweat. It is also good for those people who are having sensitive skin. And the locking button of the strap is having a HRX logo engraved. (Image attached)

6) The band is very light and you won't even feel that you are wearing a fitness tracker.

7) The screen is quite visible in sunlight.

8) Because of the new pedometer algorithm, it gives an accurate step by step data.

9) The battery backup of the Mi Band HRX edition is for 23 days as claimed by the company but in my case by using it regularly it lasted for 21 days.

10) It is very helpful it is having a screen so that you can easily look at your daily progress.

11) There are two options for time format (image attached)

12) There is another feature (lift wrist to view info) if you lift up your wrist to look for the time the display will automatically light up, no need to touch the button.

Cons:-
1) It is not having heart rate sensor so that's why the price is Rs 1299.

Final Verdict:-
If you are planning to buy a new fitness tracker and your budget is very low like below 1.5k then you must buy this Mi Band HRX edition it is definitely worth for your money which you are spending.

"""


from gensim.summarization import summarize, keywords

def text_summarization_gensim(text, summary_ratio=0.5):
	#f=open("tmp.txt",'a')
	summary = summarize(text, split=True, ratio=summary_ratio)
	for sentence in summary:
		print(sentence)
		#f.write(sentence+"\n")
	#f.close()
		

docs = parse_document(toy_text)
text = ' '.join(docs)
text_summarization_gensim(text, summary_ratio=0.4)


    
sentences = parse_document(toy_text)
norm_sentences = normalize_corpus(sentences,lemmatize=False) 

total_sentences = len(norm_sentences)
print ('Total Sentences in Document:', total_sentences )  



num_sentences = 3
num_topics = 2

vec, dt_matrix = build_feature_matrix(sentences, 
                                      feature_type='frequency')

td_matrix = dt_matrix.transpose()
td_matrix = td_matrix.multiply(td_matrix > 0)

u, s, vt = low_rank_svd(td_matrix, singular_count=num_topics)  
                                         
sv_threshold = 0.5
min_sigma_value = max(s) * sv_threshold
s[s < min_sigma_value] = 0

salience_scores = np.sqrt(np.dot(np.square(s), np.square(vt)))
#print (np.round(salience_scores, 2)) #changed

top_sentence_indices = salience_scores.argsort()[-num_sentences:][::-1]
top_sentence_indices.sort()
#print (top_sentence_indices)#changed
f=open("tmp.txt",'a')
for index in top_sentence_indices:
	print( sentences[index])
	f.write(sentences[index])
f.close()
    
    
def lsa_text_summarizer(documents, num_sentences=2,
                        num_topics=2, feature_type='frequency',
                        sv_threshold=0.5):
                            
		vec, dt_matrix = build_feature_matrix(documents, 
											  feature_type=feature_type)

		td_matrix = dt_matrix.transpose()
		td_matrix = td_matrix.multiply(td_matrix > 0)

		u, s, vt = low_rank_svd(td_matrix, singular_count=num_topics)  
		min_sigma_value = max(s) * sv_threshold
		s[s < min_sigma_value] = 0
		
		salience_scores = np.sqrt(np.dot(np.square(s), np.square(vt)))
		top_sentence_indices = salience_scores.argsort()[-num_sentences:][::-1]
		top_sentence_indices.sort()
		#f=open("tmp.txt",'a')
		for index in top_sentence_indices:
			print (sentences[index])
			#f.write(sentence[index])
		#f.close()
		
		
    
    
    

import networkx

num_sentences = 3
vec, dt_matrix = build_feature_matrix(norm_sentences, 
                                      feature_type='tfidf')
similarity_matrix = (dt_matrix * dt_matrix.T)
#print (np.round(similarity_matrix.todense(), 2))  #changed

similarity_graph = networkx.from_scipy_sparse_matrix(similarity_matrix)

networkx.draw_networkx(similarity_graph)

scores = networkx.pagerank(similarity_graph)

ranked_sentences = sorted(((score, index) 
                            for index, score 
                            in scores.items()), 
                          reverse=True)
ranked_sentences

top_sentence_indices = [ranked_sentences[index][1] 
                        for index in range(num_sentences)]
top_sentence_indices.sort()
print( top_sentence_indices)

for index in top_sentence_indices:
    print (sentences[index])
    

def textrank_text_summarizer(documents, num_sentences=2,
                             feature_type='frequency'):
    
    vec, dt_matrix = build_feature_matrix(norm_sentences, 
                                      feature_type='tfidf')
    similarity_matrix = (dt_matrix * dt_matrix.T)
        
    similarity_graph = networkx.from_scipy_sparse_matrix(similarity_matrix)
    scores = networkx.pagerank(similarity_graph)   
    
    ranked_sentences = sorted(((score, index) 
                                for index, score 
                                in scores.items()), 
                              reverse=True)

    top_sentence_indices = [ranked_sentences[index][1] 
                            for index in range(num_sentences)]
    top_sentence_indices.sort()
    #f=open("tmp.txt",'a')
    for index in top_sentence_indices:
		#f.write(sentences[index])
        print(sentences[index]  )  
	#f.close()
    

DOCUMENT = """
The Elder Scrolls V: Skyrim is an open world action role-playing video game 
developed by Bethesda Game Studios and published by Bethesda Softworks. 
It is the fifth installment in The Elder Scrolls series, following 
The Elder Scrolls IV: Oblivion. Skyrim's main story revolves around 
the player character and their effort to defeat Alduin the World-Eater, 
a dragon who is prophesied to destroy the world. 
The game is set two hundred years after the events of Oblivion 
and takes place in the fictional province of Skyrim. The player completes quests 
and develops the character by improving skills. 
Skyrim continues the open world tradition of its predecessors by allowing the 
player to travel anywhere in the game world at any time, and to 
ignore or postpone the main storyline indefinitely. The player may freely roam 
over the land of Skyrim, which is an open world environment consisting 
of wilderness expanses, dungeons, cities, towns, fortresses and villages. 
Players may navigate the game world more quickly by riding horses, 
or by utilizing a fast-travel system which allows them to warp to previously 
Players have the option to develop their character. At the beginning of the game, 
players create their character by selecting one of several races, 
including humans, orcs, elves and anthropomorphic cat or lizard-like creatures, 
and then customizing their character's appearance.discovered locations. Over the 
course of the game, players improve their character's skills, which are numerical 
representations of their ability in certain areas. There are eighteen skills 
divided evenly among the three schools of combat, magic, and stealth. 
Skyrim is the first entry in The Elder Scrolls to include Dragons in the game's 
wilderness. Like other creatures, Dragons are generated randomly in the world 
and will engage in combat. 
"""


sentences = parse_document(DOCUMENT)
norm_sentences = normalize_corpus(sentences,lemmatize=True) 
print ("Total Sentences:", len(norm_sentences) )

lsa_text_summarizer(norm_sentences, num_sentences=3,
                    num_topics=5, feature_type='frequency',
                    sv_threshold=0.5)  

textrank_text_summarizer(norm_sentences, num_sentences=3,
                         feature_type='tfidf')                                        