<?php
$data="how are you";//$_POST['text'];
$to="Mlayalam";//$_POST['to'];
$out=shell_exec('python translate.py'.$data.'~~'.$to.'2&>1' );
$file=fopen("translate.txt","r") or die("file open error");
$r=fread($file,filesize("translate.txt"));
echo $r;
fclose($file);
echo"<script>
lang=[];
lang.push({
    key:   'Afrikaans',
    value: 'af'
});
lang.push({
    key:   'Albanian',
    value: 'sq'
});
lang.push({
    key:   'Amharic',
    value: 'am'
});
lang.push({
    key:   'Arabic',
    value: 'ar'
});
lang.push({
    key:   'Armenian',
    value: 'hy'
});
lang.push({
    key:   'Azeerbaijani',
    value: 'az'
});
lang.push({
    key:   'Basque',
    value: 'eu'
});
lang.push({
    key:   'Belarusian',
    value: 'be'
});
lang.push({
    key:   'Bengali',
    value: 'bn'
});
lang.push({
    key:   'Bosnian',
    value: 'bs'
});
lang.push({
    key:   'Bulgarian',
    value: 'bg'
});
lang.push({
    key:   'Catalan',
    value: 'ca'
});
lang.push({
    key:   'Cebuano',
    value: 'ceb (ISO-639-2)'
});
lang.push({
    key:   'Chinese (Simplified)',
    value: 'zh-CN (BCP-47)'
});
lang.push({
    key:   'Chinese (Traditional)',
    value: 'zh-TW (BCP-47)'
});
lang.push({
    key:   'Corsican',
    value: 'co'
});
lang.push({
    key:   'Croatian',
    value: 'hr'
});
lang.push({
    key:   'Czech',
    value: 'cs'
});

lang.push({
    key:   'Danish',
    value: 'da'
});
lang.push({
    key:   'Dutch',
    value: 'nl'
});
lang.push({
    key:   'English',
    value: 'en'
});
lang.push({
    key:   'Esperanto',
    value: 'eo'
});
lang.push({
    key:   'Estonian',
    value: 'et'
});
lang.push({
    key:   'Finnish',
    value: 'fi'
});
lang.push({
    key:   'French',
    value: 'fr'
});
lang.push({
    key:   'Frisian',
    value: 'fy'
});
lang.push({
    key:   'Galician',
    value: 'gl'
});
lang.push({
    key:   'Georgian',
    value: 'ka'
});
lang.push({
    key:   'German',
    value: 'de'
});
lang.push({
    key:   'Greek',
    value: 'el'
});
lang.push({
    key:   'Gujarati',
    value: 'gu'
});
lang.push({
    key:   'Haitian Creole',
    value: 'ht'
});
lang.push({
    key:   'Hausa',
    value: 'ha'
});
lang.push({
    key:   'Hawaiian',
    value: 'haw (ISO-639-2)'
});
lang.push({
    key:   'Hebrew',
    value: 'iw'
});
lang.push({
    key:   'Hindi',
    value: 'hi'
});
lang.push({
    key:   'Hmong',
    value: 'hmn (ISO-639-2)'
});
lang.push({
    key:   'Hungarian',
    value: 'hu'
});
lang.push({
    key:   'Icelandic',
    value: 'is'
});

lang.push({
    key:   'Igbo',
    value: 'ig'
});
lang.push({
    key:   'Indonesian',
    value: 'id'
});
lang.push({
    key:   'Irish',
    value: 'ga'
});
lang.push({
    key:   'Italian',
    value: 'it'
});
lang.push({
    key:   'Japanese',
    value: 'ja'
});
lang.push({
    key:   'Javanese',
    value: 'jw'
});
lang.push({
    key:   'Kannada',
    value: 'kn'
});
lang.push({
    key:   'Kazakh',
    value: 'kk'
});
lang.push({
    key:   'Khmer',
    value: 'km'
});
lang.push({
    key:   'Korean',
    value: 'ko'
});
lang.push({
    key:   'Kurdish',
    value: 'ku'
});
lang.push({
    key:   'Kyrgyz',
    value: 'ky'
});
lang.push({
    key:   'Lao',
    value: 'lo'
});
lang.push({
    key:   'Latin',
    value: 'la'
});
lang.push({
    key:   'Latvian',
    value: 'lv'
});
lang.push({
    key:   'Lithuanian',
    value: 'lt'
});

lang.push({
    key:   'Luxembourgish',
    value: 'lb'
});
lang.push({
    key:   'Macedonian',
    value: 'mk'
});

lang.push({
    key:   'Malagasy',
    value: 'mg'
});
lang.push({
    key:   'Malay',
    value: 'ms'
});
lang.push({
    key:   'Malayalam',
    value: 'ml'
});
lang.push({
    key:   'Maltese',
    value: 'mt'
});
lang.push({
    key:   'Maori',
    value: 'mi'
});
lang.push({
    key:   'Marathi',
    value: 'mr'
});
lang.push({
    key:   'Mongolian',
    value: 'mn'
});
lang.push({
    key:   'Myanmar (Burmese)',
    value: 'my'
});
lang.push({
    key:   'Nepali',
    value: 'ne'
});
lang.push({
    key:   'Norwegian',
    value: 'no'
});
lang.push({
    key:   'Nyanja (Chichewa)',
    value: 'ny'
});
lang.push({
    key:   'Pashto',
    value: 'ps'
});
lang.push({
    key:   'Persian',
    value: 'fa'
});
lang.push({
    key:   'Polish',
    value: 'pl'
});
lang.push({
    key:   'Portuguese (Portugal, Brazil)',
    value: 'pt'
});
lang.push({
    key:   'Punjabi',
    value: 'pa'
});
lang.push({
    key:   'Romanian',
    value: 'ro'
});
lang.push({
    key:   'Russian',
    value: 'ru'
});
lang.push({
    key:   'Samoan',
    value: 'sm'
});
lang.push({
    key:   'Scots Gaelic',
    value: 'gd'
});
lang.push({
    key:   'Serbian',
    value: 'sr'
});
lang.push({
    key:   'Sesotho',
    value: 'st'
});
lang.push({
    key:   'Shona',
    value: 'sn'
});
lang.push({
    key:   'Sindhi',
    value: 'sd'
});
lang.push({
    key:   'Sinhala (Sinhalese)',
    value: 'si'
});
lang.push({
    key:   'Slovak',
    value: 'sk'
});
lang.push({
    key:   'Slovenian',
    value: 'sl'
});
lang.push({
    key:   'Somali',
    value: 'so'
});
lang.push({
    key:   'Spanish',
    value: 'es'
});
lang.push({
    key:   'Sundanese',
    value: 'su'
});

lang.push({
    key:   'Swahili',
    value: 'sw'
});
lang.push({
    key:   'Swedish',
    value: 'sv'
});
lang.push({
    key:   'Tagalog (Filipino)',
    value: 'tl'
});
lang.push({
    key:   'Tajik',
    value: 'tg'
});
lang.push({
    key:   'Tamil',
    value: 'ta'
});
lang.push({
    key:   'Telugu',
    value: 'te'
});
lang.push({
    key:   'Thai',
    value: 'th'
});
lang.push({
    key:   'Turkish',
    value: 'tr'
});
lang.push({
    key:   'Ukrainian',
    value: 'uk'
});
lang.push({
    key:   'Urdu',
    value: 'ur'
});
lang.push({
    key:   'Uzbek',
    value: 'uz'
});
lang.push({
    key:   'Vietnamese',
    value: 'vi'
});
lang.push({
    key:   'Welsh',
    value: 'cy'
});
lang.push({
    key:   'Xhosa',
    value: 'xh'
});
lang.push({
    key:   'Yiddish',
    value: 'yi'
});
lang.push({
    key:   'Yoruba',
    value: 'yo'
});
lang.push({
    key:   'Zulu',
    value: 'zu'
});


synthesizer=window.speechSynthesis;
var msg = new SpeechSynthesisUtterance($r);
synthesizer.lang=lang[$to];
synthesizer.speak(msg);
</script>";
?>

