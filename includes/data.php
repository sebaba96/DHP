<?php
declare(strict_types=1);

$navigation = [
    'index.php' => 'Naslovnica',
    'usluge.php' => 'Usluge',
    'sektori.php' => 'Sektori',
    'kako-radimo.php' => 'Kako radimo',
    'o-meni.php' => 'O meni',
    'cesta-pitanja.php' => 'Česta pitanja',
    'kontakt.php' => 'Kontakt',
];

$services = [
    [
        'id' => 'poslovni-planovi',
        'icon' => 'plan',
        'title' => 'Poslovni planovi i investicijske studije',
        'text' => 'Plan prilagođen svrsi: za banku, investitora, natječaj ili internu upotrebu. Analiza tržišta, financijske projekcije, novčani tok i analiza osjetljivosti.',
    ],
    [
        'id' => 'kreditiranje',
        'icon' => 'files',
        'title' => 'Zahtjevi za kreditiranje',
        'text' => 'Cjelovita dokumentacija za komercijalne banke, HAMAG-BICRO i HBOR: poslovna i financijska analiza, projekcije otplate, prateći dokumenti.',
    ],
    [
        'id' => 'eu-projekti',
        'icon' => 'report',
        'title' => 'EU projekti i bespovratna sredstva',
        'text' => 'Procjena prihvatljivosti, priprema prijave, provedba projekta, financijsko praćenje i izvještavanje.',
    ],
    [
        'id' => 'vanjski-cfo',
        'icon' => 'partner',
        'title' => 'Vanjski CFO',
        'text' => 'Financijsko vodstvo bez troška zaposlenog direktora: planiranje i budžetiranje, likvidnost, redovita izvješća i podrška odlukama. Mjesečni angažman ili po projektu.',
    ],
    [
        'id' => 'analiza',
        'icon' => 'cost',
        'title' => 'Analiza poslovanja i kontroling',
        'text' => 'Analiza segmenata, proizvoda, kupaca i troškova: gdje se zarađuje, gdje se gubi i što poduzeti.',
    ],
    [
        'id' => 'procjena',
        'icon' => 'decision',
        'title' => 'Procjena vrijednosti poduzeća',
        'text' => 'Savjetodavna procjena vrijednosti za ulazak investitora, kupnju ili prodaju poslovnog udjela, nasljeđivanje i strateške odluke, uz jasno obrazloženu metodologiju.',
    ],
    [
        'id' => 'istrazivanje',
        'icon' => 'search',
        'title' => 'Istraživanje tržišta i vizualne komunikacije',
        'text' => 'Analiza konkurencije i potražnje te materijali koji dokumentima daju profesionalan izgled.',
    ],
];

$featuredSectors = [
    ['id' => 'turizam', 'title' => 'Turizam'],
    ['id' => 'ugostiteljstvo', 'title' => 'Ugostiteljstvo'],
    ['id' => 'proizvodnja', 'title' => 'Proizvodnja'],
    ['id' => 'trgovina', 'title' => 'Trgovina na veliko i malo'],
    ['id' => 'farmacija', 'title' => 'Farmacija'],
];

$otherSectors = [
    ['id' => 'dentalna-medicina', 'title' => 'Dentalna medicina'],
    ['id' => 'logistika', 'title' => 'Logistika i promet'],
    ['id' => 'gradjevinarstvo', 'title' => 'Građevinarstvo i nekretnine'],
    ['id' => 'it', 'title' => 'IT i tehnologija'],
    ['id' => 'intelektualne-usluge', 'title' => 'Intelektualne usluge (projektantski uredi, agencije)'],
];

$sectorsIntro = 'Svaka branša ima vlastitu logiku marži, sezonalnosti i rizika. Iskustvo iz različitih djelatnosti znači da ne moraš objašnjavati kako tvoj posao funkcionira.';

$steps = [
    [
        'icon' => 'chat',
        'title' => 'Uvodni razgovor',
        'text' => 'Besplatan. Čujem što trebaš i procjenjujem je li to nešto u čemu ti mogu pomoći.',
    ],
    [
        'icon' => 'plan',
        'title' => 'Ponuda',
        'text' => 'Jasan opseg, rokovi i cijena unaprijed, bez skrivenih troškova.',
    ],
    [
        'icon' => 'work',
        'title' => 'Izrada',
        'text' => 'Radimo zajedno, uz redovite povratne informacije.',
    ],
    [
        'icon' => 'files',
        'title' => 'Predaja i podrška',
        'text' => 'Gotovi dokumenti i pomoć pri predaji ili obrani pred bankom ili institucijom.',
    ],
];

$aboutLead = [
    'Ja sam David Host, magistar ekonomije iz Rijeke. Diplomirao sam na Ekonomskom fakultetu u Rijeci s pohvalom (smjer financije i bankarstvo), a znanje stalno nadograđujem dodatnim edukacijama ne samo u financijama nego i u područjima koja ih dopunjuju. Višegodišnje iskustvo u financijama, poslovnom savjetovanju, reviziji i kontrolingu stjecao sam radeći u širokom rasponu djelatnosti - od turizma, ugostiteljstva, proizvodnje do farmacije, IT-ja i trgovine.',
    'Vjerujem u jednostavna pravila: brojke moraju biti točne, preporuke jasne, a suradnja transparentna. Ne dobivaš debele dokumente koje nitko ne čita, nego dokumente i savjete koje možeš odmah koristiti.',
];

$aboutPoints = [
    'Ekonomski fakultet Rijeka, smjer financije i bankarstvo, diplomirao s pohvalom; kontinuirane edukacije i unaprjeđenje vještina',
    'Financije, kontroling, revizija i poslovno savjetovanje',
    'Iskustvo s obje strane stola: poduzeće i financijer',
    'Dokumenti pisani za kreditne analitičare, evaluatore i poduzetnike',
];

$faqs = [
    [
        'q' => 'Jamčite li odobrenje kredita ili natječaja?',
        'a' => 'Ne, i svatko tko to obećava nije iskren. Moj posao je da zahtjev bude što kvalitetniji i uvjerljiviji, a odluku donosi banka ili institucija.',
    ],
    [
        'q' => 'Koliko košta izrada poslovnog plana?',
        'a' => 'Ovisi o opsegu i svrsi dokumenta. Nakon besplatnog uvodnog razgovora dobivaš fiksnu ponudu.',
    ],
    [
        'q' => 'Što je vanjski CFO?',
        'a' => 'Financijski stručnjak koji za tvoju tvrtku radi onaj dio posla financijskog direktora koji ti treba, na honorarnoj osnovi.',
    ],
    [
        'q' => 'Radite li s klijentima izvan Rijeke?',
        'a' => 'Da. Većina posla može se obaviti na daljinu, a za važne sastanke dolazim osobno.',
    ],
];
