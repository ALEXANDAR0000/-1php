<?php

declare(strict_types=1);

namespace Turanjanin\SerbianTransliterator;

/**
 * This list of exceptions and transliteration rules is taken from Ćirilizator - a browser extension
 * for transliterating pages from Serbian Latin to Cyrillic script.
 *
 * @see https://github.com/turanjanin/cirilizator
 */
class Data
{
    public static $cyrillicToLatin = [
        'А' => 'A',
        'Б' => 'B',
        'В' => 'V',
        'Г' => 'G',
        'Д' => 'D',
        'Ђ' => 'Đ',
        'Е' => 'E',
        'Ж' => 'Ž',
        'З' => 'Z',
        'И' => 'I',
        'Ј' => 'J',
        'К' => 'K',
        'Л' => 'L',
        'Љ' => 'LJ',
        'М' => 'M',
        'Н' => 'N',
        'Њ' => 'NJ',
        'О' => 'O',
        'П' => 'P',
        'Р' => 'R',
        'С' => 'S',
        'Т' => 'T',
        'Ћ' => 'Ć',
        'У' => 'U',
        'Ф' => 'F',
        'Х' => 'H',
        'Ц' => 'C',
        'Ч' => 'Č',
        'Џ' => 'DŽ',
        'Ш' => 'Š',
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'ђ' => 'đ',
        'е' => 'e',
        'ж' => 'ž',
        'з' => 'z',
        'и' => 'i',
        'ј' => 'j',
        'к' => 'k',
        'л' => 'l',
        'љ' => 'lj',
        'м' => 'm',
        'н' => 'n',
        'њ' => 'nj',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'ћ' => 'ć',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'č',
        'џ' => 'dž',
        'ш' => 'š',
        'Ња' => 'Nja',
        'Ње' => 'Nje',
        'Њи' => 'Nji',
        'Њо' => 'Njo',
        'Њу' => 'Nju',
        'Ља' => 'Lja',
        'Ље' => 'Lje',
        'Љи' => 'Lji',
        'Љо' => 'Ljo',
        'Љу' => 'Lju',
        'Џа' => 'Dža',
        'Џе' => 'Dže',
        'Џи' => 'Dži',
        'Џо' => 'Džo',
        'Џу' => 'Džu',
    ];

    public static $latinToAscii = [
        'Č' => 'C',
        'Ć' => 'C',
        'Đ' => 'DJ',
        'Š' => 'S',
        'Ž' => 'Z',
        'č' => 'c',
        'ć' => 'c',
        'đ' => 'dj',
        'š' => 's',
        'ž' => 'z',
        'Đa' => 'Dja',
        'Đe' => 'Dje',
        'Đi' => 'Dji',
        'Đo' => 'Djo',
        'Đu' => 'Dju',
    ];

    public static $latinToNormalizedLatin = [
        'Č' => 'Č', // C with caron
        'Ć' => 'Ć', // C with acute accent
        'DŽ' => 'DŽ', // D + Z with caron
        'Dž' => 'Dž', // D + z with caron
        'Š' => 'Š', // S with caron
        'Ž' => 'Ž', // Z with caron
        'č' => 'č', // c with caron
        'ć' => 'ć', // c with acute accent
        'dž' => 'dž', // d + z with caron
        'š' => 'š', // s with caron
        'ž' => 'ž', // z with caron

        // Unicode variants of Serbian digraphs
        'Ǆ' => 'DŽ',
        'ǅ' => 'Dž',
        'Ǉ' => 'LJ',
        'ǈ' => 'Lj',
        'Ǌ' => 'NJ',
        'ǋ' => 'Nj',
        'ǆ' => 'dž',
        'ǉ' => 'lj',
        'ǌ' => 'nj',

        'Ð' => 'Đ', // Letter Eth - @see https://en.wikipedia.org/wiki/Eth

        // Invalid auto-correct - two characters combined to one
        'æ' => 'ae',
        'ĳ' => 'ij',
        'œ' => 'oe',
        'ﬆ' => 'st',
        'ﬁ' => 'fi',
        'ﬂ' => 'fl',
    ];

    public static $latinToCyrillic = [
        'A' => 'А',
        'B' => 'Б',
        'V' => 'В',
        'G' => 'Г',
        'D' => 'Д',
        'Đ' => 'Ђ',
        'DJ' => 'Ђ',
        'Dj' => 'Ђ',
        'E' => 'Е',
        'Ž' => 'Ж',
        'Z' => 'З',
        'I' => 'И',
        'J' => 'Ј',
        'K' => 'К',
        'L' => 'Л',
        'LJ' => 'Љ',
        'Lj' => 'Љ',
        'M' => 'М',
        'N' => 'Н',
        'NJ' => 'Њ',
        'Nj' => 'Њ',
        'O' => 'О',
        'P' => 'П',
        'R' => 'Р',
        'S' => 'С',
        'T' => 'Т',
        'Ć' => 'Ћ',
        'U' => 'У',
        'F' => 'Ф',
        'H' => 'Х',
        'C' => 'Ц',
        'Č' => 'Ч',
        'DŽ' => 'Џ',
        'Dž' => 'Џ',
        'Š' => 'Ш',
        'a' => 'а',
        'b' => 'б',
        'v' => 'в',
        'g' => 'г',
        'd' => 'д',
        'đ' => 'ђ',
        'dj' => 'ђ',
        'e' => 'е',
        'ž' => 'ж',
        'z' => 'з',
        'i' => 'и',
        'j' => 'ј',
        'k' => 'к',
        'l' => 'л',
        'lj' => 'љ',
        'm' => 'м',
        'n' => 'н',
        'nj' => 'њ',
        'o' => 'о',
        'p' => 'п',
        'r' => 'р',
        's' => 'с',
        't' => 'т',
        'ć' => 'ћ',
        'u' => 'у',
        'f' => 'ф',
        'h' => 'х',
        'c' => 'ц',
        'č' => 'ч',
        'dž' => 'џ',
        'š' => 'ш',

        "d\u{200C}j" => 'дј',
        "D\u{200C}j" => 'Дј',
        "D\u{200C}J" => 'ДЈ',
        "d\u{200C}ž" => 'дж',
        "D\u{200C}ž" => 'Дж',
        "D\u{200C}Ž" => 'ДЖ',
        "n\u{200C}j" => 'нј',
        "N\u{200C}j" => 'Нј',
        "N\u{200C}J" => 'НЈ',
    ];

    public static $commonForeignWords = [
        'alpha',
        'conditions',
        'cpu',
        'dj',
        'electronics',
        'gmbh',
        'ii',
        'iii',
        'khz',
        'login',
        'public',
        'terms',
        'url',
        'vii',
        'viii',
        'visa',
    ];

    public static $commonForeignWordsPrefixes = [
        'administration',
        'adobe',
        'advanced',
        'advertising',
        'autocad',
        'book',
        'boot',
        'canon',
        'carlsberg',
        'cisco',
        'clio',
        'cloud',
        'coca-col',
        'cookie',
        'cooking',
        'cool',
        'covid',
        'dacia',
        'default',
        'developer',
        'e-mail',
        'edge',
        'email',
        'emoji',
        'english',
        'facebook',
        'fashion',
        'food',
        'foundation',
        'gaming',
        'gmail',
        'gmt',
        'good',
        'google',
        'hdmi',
        'home',
        'image',
        'iphon',
        'ipod',
        'javascript',
        'jazeera',
        'joomla',
        'league',
        'like',
        'linkedin',
        'look',
        'macbook',
        'mail',
        'maps',
        'mastercard',
        'mercator',
        'mhz',
        'microsoft',
        'mitsubishi',
        'notebook',
        'nvidia',
        'online',
        'outlook',
        'panasonic',
        'pdf',
        'peugeot',
        'podcast',
        'postpaid',
        'printscreen',
        'procredit',
        'renault',
        'screenshot',
        'seen',
        'selfie',
        'share',
        'shift',
        'shop',
        'smartphone',
        'space',
        'steam',
        'stream',
        'subscrib',
        'tool',
        'topic',
        'trailer',
        'ufc',
        'unicredit',
        'username',
        'viber',
    ];

    public static $foreignCharacterCombinations = [
        'q',
        'w',
        'x',
        'y',
        'ü',
        'ö',
        'ä',
        'ø',
        'ß',
        '&',
        '@',
        '#',
        'bb',
        'cc',
        'dd',
        'ff',
        'gg',
        'hh',
        'kk',
        'll',
        'mm',
        'nn',
        'pp',
        'rr',
        'ss',
        'tt',
        'zz',
        'ch',
        'gh',
        'th',
        "'s",
        "'t",
        '.com',
        '.net',
        '.org',
        '.info',
        '.rs',
        '.me',
        '.ba',
    ];

    public static $serbianWordsWithForeignCharacterCombinations = [
        'aparthejd',
        'ddor',
        'dss',
        'dvadesettrog',
        'epp',
        'fss',
        'gss',
        'interreakc',
        'interresor',
        'kss',
        'mmf',
        'ommetar',
        'poddirektor',
        'poddres',
        'posthumn',
        'posttrans',
        'posttraum',
        'pothranj',
        'prethod',
        'ptt',
        'sbb',
        'ssp',
        'sssr',
        'superračun',
        'transseks',
        'transsibir',
        'tridesettrog',
    ];

    public static $digraphExceptions = [
        'dj' => [
            'adjektiv',
            'adjunkt',
            'bazdje',
            'bdje',
            'bezdje',
            'blijedje',
            'bludje',
            'bridjе',
            'vidjel',
            'vidjet',
            'vindjakn',
            'višenedje',
            'vrijedje',
            'gdje',
            'gudje',
            'gdjir',
            'daždje',
            'dvonedje',
            'devetonedje',
            'desetonedje',
            'djb',
            'djeva',
            'djevi',
            'djevo',
            'djed',
            'djejstv',
            'djel',
            'djenem',
            'djeneš',
            'djenu',
            'djet',
            'djec',
            'dječ',
            'djuar',
            'djubison',
            'djubouz',
            'djuer',
            'djui',
            'djuks',
            'djulej',
            'djumars',
            'djupont',
            'djurant',
            'djusenberi',
            'djuharst',
            'djuherst',
            'dovdje',
            'dogrdje',
            'dodjel',
            'drvodje',
            'drugdje',
            'elektrosnabdje',
            'žudje',
            'zabludje',
            'zavidje',
            'zavrijedje',
            'zagudje',
            'zadjev',
            'zadjen',
            'zalebdje',
            'zaludje',
            'zaodje',
            'zapodje',
            'zarudje',
            'zasjedje',
            'zasmrdje',
            'zastidje',
            'zaštedje',
            'zdje',
            'zlodje',
            'igdje',
            'izbledje',
            'izblijedje',
            'izvidje',
            'izdjejst',
            'izdjelj',
            'izludje',
            'isprdje',
            'jednonedje',
            'kojegdje',
            'kudjelj',
            'lebdje',
            'ludjel',
            'ludjet',
            'makfadjen',
            'marmadjuk',
            'međudjel',
            'nadjaha',
            'nadjača',
            'nadjeb',
            'nadjev',
            'nadjenul',
            'nadjenuo',
            'nadjenut',
            'negdje',
            'nedjel',
            'nadjunač',
            'nenadjača',
            'nenavidje',
            'neodje',
            'nepodjarm',
            'nerazdje',
            'nigdje',
            'obdjel',
            'obnevidje',
            'ovdje',
            'odjav',
            'odjah',
            'odjaš',
            'odjeb',
            'odjev',
            'odjed',
            'odjezd',
            'odjek',
            'odjel',
            'odjen',
            'odjeć',
            'odjec',
            'odjur',
            'odsjedje',
            'ondje',
            'opredje',
            'osijedje',
            'osmonedje',
            'pardju',
            'perdju',
            'petonedje',
            'poblijedje',
            'povidje',
            'pogdjegdje',
            'pogdje',
            'podjakn',
            'podjamč',
            'podjemč',
            'podjar',
            'podjeb',
            'podjebrad',
            'podjed',
            'podjezič',
            'podjel',
            'podjen',
            'podjet',
            'pododjel',
            'pozavidje',
            'poludje',
            'poljodjel',
            'ponegdje',
            'ponedjelj',
            'porazdje',
            'posijedje',
            'posjedje',
            'postidje',
            'potpodjel',
            'poštedje',
            'pradjed',
            'prdje',
            'preblijedje',
            'previdje',
            'predvidje',
            'predjel',
            'preodjen',
            'preraspodje',
            'presjedje',
            'pridjev',
            'pridjen',
            'prismrdje',
            'prištedje',
            'probdje',
            'problijedje',
            'prodjen',
            'prolebdje',
            'prosijedje',
            'prosjedje',
            'protivdjel',
            'prošlonedje',
            'razvidje',
            'razdjev',
            'razdjel',
            'razodje',
            'raspodje',
            'rasprdje',
            'remekdjel',
            'rudjen',
            'rudjet',
            'sadje',
            'svagdje',
            'svidje',
            'svugdje',
            'sedmonedjelj',
            'sijedje',
            'sjedje',
            'smrdje',
            'snabdje',
            'snovidje',
            'starosjedje',
            'stidje',
            'studje',
            'sudjel',
            'tronedje',
            'ublijedje',
            'uvidje',
            'udjel',
            'udjen',
            'uprdje',
            'usidjel',
            'usjedje',
            'usmrdje',
            'uštedje',
            'cjelonedje',
            'četvoronedje',
            'čukundjed',
            'šestonedjelj',
            'štedje',
            'štogdje',
            'šukundjed',
        ],
        'dž' => [
            'feldžandarm',
            'nadžanj',
            'nadždrel',
            'nadžel',
            'nadžeo',
            'nadžet',
            'nadživ',
            'nadžinj',
            'nadžnj',
            'nadžrec',
            'nadžup',
            'odžali',
            'odžari',
            'odžel',
            'odžive',
            'odživljava',
            'odžubor',
            'odžvaka',
            'odžval',
            'odžvać',
            'podžanr',
            'podžel',
            'podže',
            'podžig',
            'podžiz',
            'podžil',
            'podžnje',
            'podžupan',
            'predželu',
            'predživot',
        ],
        'nj' => [
            'anjon',
            'injaric',
            'injekc',
            'injekt',
            'injicira',
            'injurij',
            'kenjon',
            'konjug',
            'konjunk',
            'nekonjug',
            'nekonjunk',
            'ssrnj',
            'tanjug',
            'vanjezičk',
        ],
    ];

    // @see: https://en.wikipedia.org/wiki/Zero-width_non-joiner
    public static $digraphReplacements = [
        'dj' => [
            'dj' => "d\u{200C}j",
            'Dj' => "D\u{200C}j",
            'DJ' => "D\u{200C}J",
        ],
        'dž' => [
            'dž' => "d\u{200C}ž",
            'Dž' => "D\u{200C}ž",
            'DŽ' => "D\u{200C}Ž",
        ],
        'nj' => [
            'nj' => "n\u{200C}j",
            'Nj' => "N\u{200C}j",
            'NJ' => "N\u{200C}J",
        ],
    ];
}
