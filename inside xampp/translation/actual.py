# -*- coding: utf-8 -*-
from googletrans import Translator
import os
import codecs
#from __future__ import with_statement   # Not required in Python 2.6 any more

#import codecs
import pickle
import sys
translator = Translator()
lang={'Afrikaans':	'af',
'Albanian':	'sq',
'Amharic':	'am',
'Arabic':	'ar',
'Armenian':	'hy',
'Azeerbaijani':	'az',
'Basque':	'eu',
'Belarusian':	'be',
'Bengali':	'bn',
'Bosnian'	:'bs',
'Bulgarian'	:'bg',
'Catalan'	:'ca',
'Cebuano'	:'ceb(ISO-639-2)',
'Chinese (Simplified)':	'zh-CN (BCP-47)',
'Chinese (Traditional)'	:'zh-TW (BCP-47)',
'Corsican'	:'co',
'Croatian':	'hr',
'Czech'	:'cs',
'Danish':	'da',
'Dutch'	:'nl',
'English'	:'en',
'Esperanto'	:'eo',
'Estonian':	'et',
'Finnish'	:'fi',
'French':	'fr',
'Frisian'	:'fy',
'Galician':	'gl',
'Georgian'	:'ka',
'German'	:'de',
'Greek'	:'el',
'Gujarati':	'gu',
'Haitian Creole':	'ht',
'Hausa':	'ha',
'Hawaiian':	'haw (ISO-639-2)',
'Hebrew'	:'iw',
'Hindi':	'hi',
'Hmong'	:'hmn (ISO-639-2)',
'Hungarian':	'hu',
'Icelandic'	:'is',
'Igbo':	'ig',
'Indonesian':	'id',
'Irish'	:'ga',
'Italian':	'it',
'Japanese'	:'ja',
'Javanese'	:'jw',
'Kannada'	:'kn',
'Kazakh':	'kk',
'Khmer'	:'km',
'Korean':	'ko',
'Kurdish'	:'ku',
'Kyrgyz':	'ky',
'Lao'	:'lo',
'Latin':	'la',
'Latvian'	:'lv',
'Lithuanian':	'lt',
'Luxembourgish':	'lb',
'Macedonian':	'mk',
'Malagasy'	:'mg',
'Malay':	'ms',
'Malayalam'	:'ml',
'Maltese':	'mt',
'Maori'	:'mi',
'Marathi':	'mr',
'Mongolian'	:'mn',
'Myanmar (Burmese)':	'my',
'Nepali'	:'ne',
'Norwegian':	'no',
'Nyanja (Chichewa)'	:'ny',
'Pashto':	'ps',
'Persian'	:'fa',
'Polish':	'pl',
'Portuguese (Portugal, Brazil)':	'pt',
'Punjabi':	'pa',
'Romanian':	'ro',
'Russian':	'ru',
'Samoan':	'sm',
'Scots Gaelic':	'gd',
'Serbian'	:'sr',
'Sesotho':	'st',
'Shona'	:'sn',
'Sindhi':	'sd',
'Sinhala (Sinhalese)'	:'si',
'Slovak':	'sk',
'Slovenian'	:'sl',
'Somali':	'so',
'Spanish'	:'es',
'Sundanese':	'su',
'Swahili'	:'sw',
'Swedish':	'sv',
'Tagalog (Filipino)'	:'tl',
'Tajik'	:'tg',
'Tamil'	:'ta',
'Telugu':	'te',
'Thai'	:'th',
'Turkish':	'tr',
'Ukrainian'	:'uk',
'Urdu'	:'ur',
'Uzbek'	:'uz',
'Vietnamese':	'vi',
'Welsh'	:'cy',
'Xhosa':	'xh',
'Yiddish'	:'yi',
'Yoruba':	'yo',
'Zulu'	:'zu'}
#print(translator.translate('ആരാ').text)
# <Translated src=ko dest=en text=Good evening. pronunciation=Good evening.>
#str1=translator.translate('안녕하세요.', dest='ml').text
# <Translated src=ko dest=ja text=こんにちは。 pronunciation=Kon'nichiwa.>
#print(translator.translate('veritas lux mea', src='la').text)

str1=""
#file =open("translate.txt","r")
#str1=file.read()
#file.close()
i=0
for eachArg in sys.argv: 
		if eachArg=="~~":
			i=i+1
			break
		if eachArg !="actual.py":
			str1+=eachArg
			i=i+1
#print (sys.argv[i+1])
#os.remove("translate.txt")

#file=open("to.txt","r")
#to=file.read()
#file.close()

#os.remove('to.txt')
#file.write(str1)

#with codecs.open('translate.txt', 'w', 'utf-8') as stream:
	#stream.write(str2)



#file =open("translate.txt","wb")
#file.write(translator.translate(str1, dest=lang[to]).text.encode("utf-8"))
#pickle.dump(file,str2)
#file.close()


from gtts import gTTS#pip install pyglet #pip install pygame #pip install playsound
str2=translator.translate(str1, dest=lang[sys.argv[i+1]]).text
tts = gTTS(text=str2, lang=lang[sys.argv[i+1]])
filename = 'temp.mp3'
tts.save(filename)


import playsound
playsound.playsound('temp.mp3',True)
os.remove('temp.mp3')



