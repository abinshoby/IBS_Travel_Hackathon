from googletrans import Translator
import sys
#language codes
dict={
'Afrikaans':	'af',
'Albanian'	:'sq',
'Amharic':	'am',
'Arabic':	'ar',
'Armenian':	'hy',
'Azeerbaijani':	'az',
'Basque':	'eu',
'Belarusian':	'be',
'Bengali':	'bn',
'Bosnian':	'bs',
'Bulgarian':	'bg',
'Catalan':	'ca',
'Cebuano'	:'ceb (ISO-639-2)',
'Chinese (Simplified)'	:'zh-CN (BCP-47)',
'Chinese (Traditional)'	:'zh-TW (BCP-47)',
'Corsican':	'co',
'Croatian':	'hr',
'Czech':	'cs',
'Danish':	'da',
'Dutch':	'nl',
'English'	:'en',
'Esperanto':	'eo',
'Estonian':	'et',
'Finnish'	:'fi',
'French'	:'fr',
'Frisian':	'fy',
'Galician':	'gl',
'Georgian'	:'ka',
'German'	:'de',
'Greek'	:'el',
'Gujarati':	'gu',
'Haitian Creole'	:'ht',
'Hausa'	:'ha',
'Hawaiian':	'haw (ISO-639-2)',
'Hebrew'	:'iw',
'Hindi':	'hi',
'Hmong'	:'hmn (ISO-639-2)',
'Hungarian'	:'hu',
'Icelandic':	'is',
'Igbo'	:'ig',
'Indonesian':	'id',
'Irish'	:'ga',
'Italian':	'it',
'Japanese':	'ja',
'Javanese':	'jw',
'Kannada'	:'kn',
'Kazakh':	'kk',
'Khmer':	'km',
'Korean'	:'ko',
'Kurdish'	:'ku',
'Kyrgyz'	:'ky',
'Lao'	:'lo',
'Latin':	'la',
'Latvian':'lv',
'Lithuanian'	:'lt',
'Luxembourgish':	'lb',
'Macedonian':	'mk',
'Malagasy':	'mg',
'Malay':	'ms',
'Malayalam':	'ml',
'Maltese'	:'mt',
'Maori'	:'mi',
'Marathi'	:'mr',
'Mongolian'	:'mn',
'Myanmar (Burmese)':	'my',
'Nepali':	'ne',
'Norwegian':	'no',
'Nyanja (Chichewa)'	:'ny',
'Pashto'	:'ps',
'Persian'	:'fa',
'Polish'	:'pl',
'Portuguese (Portugal, Brazil)':	'pt',
'Punjabi':	'pa',
'Romanian':	'ro',
'Russian'	:'ru',
'Samoan':	'sm',
'Scots Gaelic':	'gd',
'Serbian'	:'sr',
'Sesotho':	'st',
'Shona':	'sn',
'Sindhi':	'sd',
'Sinhala (Sinhalese)':	'si',
'Slovak'	:'sk',
'Slovenian'	:'sl',
'Somali'	:'so',
'Spanish'	:'es',
'Sundanese'	:'su',
'Swahili'	:'sw',
'Swedish'	:'sv',
'Tagalog (Filipino)'	:'tl',
'Tajik'	:'tg',
'Tamil':	'ta',
'Telugu'	:'te',
'Thai':'th',
'Turkish':'tr',
'Ukrainian'	:'uk',
'Urdu':'ur',
'Uzbek':'uz',
'Vietnamese'	:'vi',
'Welsh':'cy',
'Xhosa'	:'xh',
'Yiddish'	:'yi',
'Yoruba':	'yo',
'Zulu'	:'zu'
}




#take the text and to
i=0;
text=""
for eacharg in sys.argv:
	if(eacharg!="translate.py" and  eacharg!="~~"):
		text+=(eacharg+" " )
		i=i+1
	if(eacharg=="~~"):
		i=i+1
		break
to=sys.argv[i+1]
translator=Translator()

file=open("translate.txt","wb")#output
file.write(translator.translate(text,dest=dict[to]).text.encode())
file.close()


		

