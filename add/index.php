<?php
if (!isset($_SESSION)) session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$user = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($user) <= 0) {
    header("Location: /");
    die();
}

if ($user[0]["isblock"] == 1) {
    header("Location: /block/");
    die();
}

$user = $user[0];

$emoji = ["😃", "😃", "😄", "😁", "😆", "😅", "🤣", "😂", "🙂", "🙃", "😉", "😊", "😇", "🥰", "😍", "🤩", "😘", "😗", "😚", "😙", "😋", "😛", "😜", "🤪", "😝", "🤑", "🤗", "🤭", "🤫", "🤔", "🤐", "🤨", "😐", "😑", "😶", "😏", "😒", "🙄", "😬", "🤥", "😌", "😔", "😪", "🤤", "🤒", "🤕", "🤢", "🤮", "🤧", "🥵", "🥶", "🥴", "😵", "🤯", "🤠", "🥳", "😎", "😕", "😟", "🙁", "☹️", "😮", "😯", "😲", "😳", "😦", "😧", "😨", "😰", "😥", "😢", "😭", "😱", "😖", "😣", "😞", "😓", "😩", "😫", "😤", "😡", "😠", "🤬", "🥱", "😈", "👿", "💀", "☠️", "💩", "🤡", "👹", "👺", "👻", "👽", "👾", "🤖", "😺", "😸", "😹", "😻", "😼", "😽", "🙀", "😿", "😾", "💋", "😀", "🤓", "🧐", "💫", "❤️️", "💛", "💕", "💯", "💥", "💣", "💟", "💨", "🕳️", "💌", "💦", "👁️‍🗨️", "💓", "💔", "💖", "💗", "💘", "💙", "💚", "💜", "💝", "💞", "💢", "💤", "💬", "💭", "🖤", "🗨", "🗯", "🧡", "❣", "🤎", "🤍", "😴", "😷", "🥺", "❤️️", "🤡", "🤍", "🥲", "🥸", "🤌",];
$people = ["👋", "🤚", "🖐", "✋", "🖖", "👌", "✌️", "🤞", "🤟", "🤘", "🤙", "👈", "👉", "👆", "🖕", "👇", "☝", "👍", "👎", "✊", "👊", "🤛", "🤜", "🤏", "👏", "🙌", "👐", "🤲", "🤝", "🙏", "✍️", "💅", "🤳", "💪", "🦵", "🦶", "👂", "👃", "🧠", "🦷", "🦴", "👀", "👁", "👅", "👄", "👶", "🧒", "👦", "👧", "🧑", "👱", "👨", "🧔", "👱‍♂️", "👨‍🦰", "👨‍🦱", "👨‍🦳", "👨‍🦲", "👩", "👱‍♀️", "👩‍🦰", "👩‍🦱", "👩‍🦳", "👩‍🦲", "🧓", "👴", "👵", "🙍", "🙍‍♂️", "🙍‍♀️", "🙎", "🙎‍♂️", "🙎‍♀️", "🙅", "🙅‍♂️", "🙅‍♀️", "🙆", "🙆‍♂️", "🙆‍♀️", "💁", "💁‍♂️", "💁‍♀️", "🙋", "🙋‍♂️", "🙋‍♀️", "🙇", "🙇‍♂️", "🙇‍♀️", "🤦", "🤦‍♂️", "🤦‍♀️", "🤷", "🤷‍♂️", "🤷‍♀️", "👨‍⚕️", "👩‍⚕️", "👨‍🎓", "👩‍🎓", "👨‍🏫", "👩‍🏫", "👨‍⚖️", "👩‍⚖️", "👨‍🌾", "👩‍🌾", "👨‍🍳", "👩‍🍳", "👨‍🔧", "👩‍🔧", "👨‍🏭", "👩‍🏭", "👨‍💼", "👩‍💼", "👨‍🔬", "👩‍🔬", "👨‍💻", "👩‍💻", "👨‍🎤", "👩‍🎤", "👨‍🎨", "👩‍🎨", "👨‍✈️", "👩‍✈️", "👨‍🚀", "👩‍🚀", "👨‍🚒", "👩‍🚒", "👮", "👮‍♂️", "👮‍♀️", "🕵️", "🕵️‍♂️", "🕵️‍♀️", "💂", "💂‍♂️", "💂‍♀️", "👷", "👷‍♂️", "👷‍♀️", "🤴", "👸", "👳", "👳‍♂️", "👳‍♀️", "👲", "🧕", "🤵", "👰", "🤰", "🤱", "👼", "🎅", "🤶", "🦸", "🦸‍♂️", "🦸‍♀️", "🦹", "🦹‍♂️", "🦹‍♀️", "🧙", "🧙‍♂️", "🧙‍♀️", "🧚", "🧚‍♂️", "🧚‍♀️", "🧛", "🧛‍♂️", "🧛‍♀️", "🧜", "🧜‍♂️", "🧜‍♀️", "🧝", "🧝‍♂️", "🧝‍♀️", "🧞", "🧞‍♂️", "🧞‍♀️", "🧟", "🧟‍♂️", "🧟‍♀️", "💆", "💆‍♂️", "💆‍♀️", "💇", "💇‍♂️", "💇‍♀️", "🚶", "🚶‍♂️", "🚶‍♀️", "👨‍🦯", "👩‍🦯", "👨‍🦼", "👩‍🦼", "👨‍🦽", "👩‍🦽", "🦾", "🦿", "🧏", "🧏‍♂️", "🧏‍♀️", "🏃", "🏃‍♂️", "🏃‍♀️", "🧍", "🧍‍♂️", "🧍‍♀️", "🧎", "🧎‍♂️", "🧎‍♀️", "💃", "🕺", "🕴️", "👯", "👯‍♂️", "👯‍♀️", "🧖", "🧖‍♂️", "🧖‍♀️", "👭", "👫", "👬", "🧑‍🤝‍🧑", "💏", "👨‍❤️‍💋‍👨", "👩‍❤️‍💋‍👩", "👩‍❤️‍💋‍👨", "💑", "👩‍❤️‍👨", "👩‍❤️‍👩", "👨‍❤️‍👨", "👪", "👨‍👩‍👦", "👨‍👩‍👧", "👨‍👩‍👧‍👦", "👨‍👩‍👦‍👦", "👨‍👩‍👧‍👧", "👨‍👨‍👦", "👨‍👨‍👧", "👨‍👨‍👧‍👦", "👨‍👨‍👦‍👦", "👨‍👨‍👧‍👧", "👩‍👩‍👦", "👩‍👩‍👧", "👩‍👩‍👧‍👦", "👩‍👩‍👦‍👦", "👩‍👩‍👧‍👧", "👨‍👦", "👨‍👦‍👦", "👨‍👧", "👨‍👧‍👦", "👨‍👧‍👧", "👩‍👦", "👩‍👦‍👦", "👩‍👧", "👩‍👧‍👦", "👩‍👧‍👧", "🗣️", "👤", "👥", "👣", "👓", "🕶", "🥽", "🥼", "👔", "👕", "👖", "🧣", "🧤", "🧥", "🧦", "👗", "👘", "👙", "👚", "👛", "👜", "👝", "🎒", "👞", "👟", "🥾", "🥿", "👠", "👡", "👢", "👑", "👒", "🎩", "🎓", "🧢", "⛑", "💄", "💍", "🦺", "🥻", "🩱", "🩲", "🩳", "🛍️", "🩰", "📿", "🛀", "🛌", "💎", "🚣", "🏇", "🏌️‍♂️", "🏌", "⛷️", "🏂", "🏌️‍♀️", "🏄", "🏄‍♀️", "🏄‍♂️", "🏊", "🏊‍♀️", "🏊‍♂️", "🏋", "🏋️‍♀️", "🏋️‍♂️", "🚣‍♀️", "🚣‍♂️", "🚴", "🚴‍♀️", "🚴‍♂️", "🚵", "🚵‍♀️", "🚵‍♂️", "🤸", "🤸‍♀️", "🤸‍♂️", "🤹", "🤹‍♀️", "🤹‍♂️", "🤺", "🤼", "🤼‍♀️", "🤼‍♂️", "🤽", "🤽‍♀️", "🤽‍♂️", "🤾", "🤾‍♀️", "🤾‍♂️", "⛹", "⛹️‍♀️", "⛹️‍♂️", "🕴", "🧗", "🧗‍♀️", "🧗‍♂️", "🦻", "🧘", "🧘‍♀️", "🧘‍♂️", "🦰", "🦱", "🦲", "🦳", "⚾", "🎣", "🎳", "🎽", "🎾", "🎿", "🏀", "🏈", "🏉", "🏏", "🏐", "🏑", "🏒", "🏓", "🏸", "🛷", "🥅", "🥊", "🥋", "🥌", "🥍", "🥎", "🥏", "⚽", "⛳", "⛸", "🤿", "🎖", "🏅", "🏆", "🥇", "🥈", "🥉", "🤌", "🫀", "🫁", "🥷", "🤵", "🤵‍♀️", "👰", "👰‍♂️", "👩‍🍼", "🧑‍🍼", "👨‍🍼", "🧑‍🎄", "🫂", "🩴", "🪖"];
$items = ["💼", "🕳️", "💣", "🔪", "🏺", "⏲️", "📯", "🎙️", "🎚️", "🎛️", "📻", "📱", "📲", "☎️", "📞", "📟", "📠", "🔋", "🔌", "💻", "🖥️", "🖨️", "⌨️", "🖱", "🖲️", "💽", "💾", "💿", "📀", "🧮", "🎥", "🎞️", "📽️", "🎬", "📺", "📷", "📸", "📹", "📼", "🔍", "🔎", "🕯️", "💡", "🔦", "🏮", "🪔", "📔", "📕", "📖", "📗", "📘", "📙", "📚", "📓", "📒", "📃", "📜", "📄", "📰", "🗞", "📑", "🔖", "🏷️", "💰", "💴", "💵", "💶", "💷", "💸", "💳", "🧾", "💹", "💱", "💲", "✉️", "📧", "📨", "📩", "📤", "📥", "📦", "📫", "📪", "📬", "📭", "📮", "🗳", "✏️", "✒️", "🖋️", "🖊", "🖌", "🖍", "📝", "📁", "📂", "🗂️", "📅", "📆", "🗒️", "🗓", "📇", "📈", "📉", "📊", "📋", "📌", "📍", "📎", "🖇️", "📏", "📐", "✂", "🗃️", "🗄️", "🗑️", "🔒", "🔓", "🔏", "🔐", "🔑", "🗝️", "🔨", "⛏️", "⚒️", "🛠", "🗡", "⚔", "🪓", "🏹", "🛡", "🔫", "🔧", "🔩", "⚙", "🗜", "⚖", "🔗", "⛓", "🧰", "🧲", "⚗", "🧪", "🧫", "🧬", "🔬", "🔭", "📡", "💉", "🦯", "🩸", "💊", "🩹", "🩺", "🚪", "🛏️", "🛋️", "🪑", "🚽", "🚿", "🛁", "🪒", "🧴", "🧷", "🧹", "🧺", "🧻", "🧼", "🧽", "🧯", "🛒", "🚬", "🚰", "🎧", "🎤", "🎵", "🎶", "🎼", "📢", "📣", "🔇", "🔈", "🔉", "🔊", "🔔", "🔕", "🎷", "🎸", "🎹", "🎺", "🎻", "🥁", "🪕", "🪡", "🪗", "🪘", "🪙", "🪃", "🪚", "🪛", "🪝", "🪜", "🪞", "🪟", "🪠", "🪤", "🪣", "🪥"];
$nature = ["🦦", "🙈", "🙉", "🙊", "🐵", "🐒", "🦍", "🦧", "🐶", "🐕", "🐩", "🦮", "🐕‍🦺", "🐺", "🦊", "🦝", "🐱", "🐈", "🦁", "🐯", "🐅", "🐆", "🐴", "🐎", "🦄", "🦓", "🦌", "🐮", "🐂", "🐃", "🐄", "🐷", "🐖", "🐽", "🐗", "🐏", "🐑", "🐐", "🐪", "🐫", "🦙", "🦒", "🐘", "🦏", "🦛", "🐭", "🐁", "🐀", "🐹", "🐰", "🐇", "🐿️", "🦔", "🦇", "🐻", "🐨", "🐼", "🦥", "🦨", "🦘", "🦡", "🐾", "🦃", "🐔", "🐓", "🐣", "🐤", "🐥", "🐦", "🐧", "🕊️", "🦅", "🦆", "🦢", "🦉", "🦩", "🦚", "🦜", "🐸", "🐊", "🐢", "🦎", "🐍", "🐲", "🐉", "🦕", "🦖", "🐳", "🐋", "🐬", "🐟", "🐠", "🐡", "🦈", "🐙", "🐚", "🐌", "🦋", "🐛", "🐜", "🐝", "🐞", "🦗", "🕷️", "🕸️", "🦂", "🦟", "🦠", "💐", "🌸", "💮", "🏵️", "🌹", "🥀", "🌺", "🌻", "🌼", "🌷", "🌱", "🌲", "🌳", "🌴", "🌵", "🌾", "🌿", "☘️", "🍀", "🍁", "🍂", "🍃", "🐈‍⬛", "🦬", "🦣", "🦫", "🐻‍❄️", "🦤", "🪶", "🦭", "🪲", "🪳", "🪰", "🪱", "🪴"];
$eat = ["🍭", "🎂", "🍰", "🍬", "🍫", "🍪", "🍮", "🍩", "🍯", "🍨", "🍧", "🍦", "🥧", "🧁", "🍏", "🍌", "🍒", "🍓", "🍐", "🍋", "🍇", "🥝", "🍈", "🍑", "🍎", "🍊", "🍅", "🍉", "🍍", "🥥", "🥭", "🥑", "🌰", "🥕", "🥒", "🌽", "🍆", "🌶️", "🍄", "🥜", "🥔", "🥦", "🥬", "🧄", "🧅", "🍳", "🍞", "🍕", "🥓", "🥖", "🌯", "🧀", "🥐", "🍟", "🥗", "🍔", "🌭", "🍖", "🥞", "🍿", "🍲", "🍗", "🌮", "🥘", "🥙", "🥚", "🥣", "🥨", "🥩", "🥪", "🥫", "🥯", "🧂", "🧇", "🧆", "🧈", "🏺", "🍴", "🍽️", "🔪", "🥄", "🥢", "🍼", "🍺", "🍾", "🍻", "🥂", "🍸", "🥛", "☕", "🍶", "🍵", "🍹", "🥃", "🍷", "🥤", "🧃", "🧉", "🧊", "🍱", "🍚", "🍛", "🍡", "🍥", "🍤", "🍢", "🍙", "🍘", "🍠", "🍝", "🍜", "🍣", "🥟", "🥠", "🥡", "🥮", "🦀", "🦐", "🦑", "🦞", "🦪", "🫐", "🫒", "🫑", "🫓", "🫔", "🫕", "🫖", "🧋"];
$activity = ["🧶", "🧵", "🧨", "🎈", "🎉", "🎊", "🎎", "🎏", "🎐", "🧧", "🎀", "🎁", "🔮", "🧿", "🕹️", "🧸", "🖼️", "✨", "🎆", "🎄", "🎑", "🎍", "🎇", "🎋", "🎃", "🎗", "🎟", "🎫", "🎨", "🎭", "⚾", "🎣", "🎳", "🎽", "🎾", "🎿", "🏀", "🏈", "🏉", "🏏", "🏐", "🏑", "🏒", "🏓", "🏸", "🛷", "🥅", "🥊", "🥋", "🥌", "🥍", "🥎", "🥏", "⚽", "⛳", "⛸", "🤿", "🎲", "🀄", "🃏", "🎮", "🎯", "🎰", "🎱", "🎴", "🧩", "♟", "♠", "♣", "♥", "♦", "🪀", "🪁", "🎖", "🏅", "🏆", "🥇", "🥈", "🥉", "🪄", "🪅", "🪆", "🪢", "🪧"];
$places = ["🧳", "☂️", "🌂", "🗺️", "🧭", "🧱", "🛢", "💈", "🛎️", "⌛", "⏳", "⌚", "⏰", "⏱️", "🕰️", "🌡️", "⛱️", "⚰", "⚱", "🗿", "🌎", "🌏", "🌍", "🌐", "🗾", "🌟", "🌞", "❄️", "🌈", "🌜", "🔥", "🌙", "⭐", "☁️", "🌩️", "⛈", "🌧️", "🌨️", "☄️", "💧", "🌓", "🌛", "🌫️", "🌕", "🌝", "⚡", "🌗", "🌌", "🌑", "🌚", "🌠", "☃️", "⛄", "☀", "⛅", "🌥", "🌦", "🌤", "🌪", "☔", "🌘", "🌖", "🌊", "🌒", "🌔", "🌬", "🌀", "🪐", "🚀", "🚡", "✈️", "🛬", "🛫", "🚁", "🚠", "🛰️", "💺", "🛩️", "🚟", "🛸", "🪂", "⏲️", "🕐", "🕑", "🕒", "🕓", "🕔", "🕕", "🕖", "🕗", "🕘", "🕙", "🕚", "🕛", "🕜", "🕝", "🕞", "🕟", "🕠", "🕡", "🕢", "🕣", "🕤", "🕥", "🕦", "🕧", "🚘", "🚨", "🚑", "🚛", "🚗", "🚲", "🚌", "🚏", "🚧", "🚚", "🚒", "⛽", "🚄", "🚅", "🚥", "🛴", "🚈", "🚂", "🚇", "🚐", "🚝", "🛵", "🏍️", "🚞", "🚍", "🚔", "🚜", "🚖", "🚓", "🏎️", "🚃", "🛤️", "🚉", "🚕", "🚆", "🚊", "🚋", "🚎", "🚦", "🚙", "🛑", "🛣", "🛹", "🦽", "🦼", "🛺", "⚓", "⛴️", "🛥️", "🛳️", "⛵", "🚢", "🚤", "🛶", "🏦", "🏗️", "🏰", "🏛️", "🏪", "🏬", "🏚️", "🏭", "🏥", "🏨", "🏘️", "🏠", "🏡", "🏯", "🏣", "🏩", "🏢", "🏤", "🏫", "🏟️", "🗽", "🗼", "💒", "🌉", "🎠", "🏙️", "🌆", "🎡", "🌁", "⛲", "🌃", "🎢", "🌅", "🌄", "🌇", "⛺", "🎪", "♨", "🏖️", "🏕️", "🏜️", "🏝️", "🗻", "⛰️", "🏞️", "🏔️", "🌋", "⛪", "🕋", "🕌", "⛩️", "🕍", "🛕", "🪨", "🪵", "🛖", "🛻", "🛼", "🪦"];
$flags = ["🏁", "🎌", "🏳", "🏳️‍🌈", "🏴", "🏴‍☠️", "🚩", "🇺🇸", "🇦🇨", "🇦🇩", "🇦🇪", "🇦🇫", "🇦🇬", "🇦🇮", "🇦🇱", "🇦🇲", "🇦🇴", "🇦🇶", "🇦🇷", "🇦🇸", "🇦🇹", "🇦🇺", "🇦🇼", "🇦🇽", "🇦🇿", "🇧🇦", "🇧🇧", "🇧🇩", "🇧🇪", "🇧🇫", "🇧🇬", "🇧🇭", "🇧🇮", "🇧🇯", "🇧🇱", "🇧🇲", "🇧🇳", "🇧🇴", "🇧🇶", "🇧🇷", "🇧🇸", "🇧🇹", "🇧🇻", "🇧🇼", "🇧🇾", "🇧🇿", "🇨🇦", "🇨🇨", "🇨🇩", "🇨🇫", "🇨🇬", "🇨🇭", "🇨🇮", "🇨🇰", "🇨🇱", "🇨🇲", "🇨🇳", "🇨🇴", "🇨🇵", "🇨🇷", "🇨🇺", "🇨🇻", "🇨🇼", "🇨🇽", "🇨🇾", "🇨🇿", "🇩🇪", "🇩🇬", "🇩🇯", "🇩🇰", "🇩🇲", "🇩🇴", "🇩🇿", "🇪🇦", "🇪🇨", "🇪🇪", "🇪🇬", "🇪🇭", "🇪🇷", "🇪🇸", "🇪🇹", "🇪🇺", "🇫🇮", "🇫🇯", "🇫🇰", "🇫🇲", "🇫🇴", "🇫🇷", "🇬🇦", "🇬🇧", "🇬🇩", "🇬🇪", "🇬🇫", "🇬🇬", "🇬🇭", "🇬🇮", "🇬🇱", "🇬🇲", "🇬🇳", "🇬🇵", "🇬🇶", "🇬🇷", "🇬🇸", "🇬🇹", "🇬🇺", "🇬🇼", "🇬🇾", "🇭🇰", "🇭🇲", "🇭🇳", "🇭🇷", "🇭🇹", "🇭🇺", "🇮🇨", "🇮🇩", "🇮🇪", "🇮🇱", "🇮🇲", "🇮🇳", "🇮🇴", "🇮🇶", "🇮🇷", "🇮🇸", "🇮🇹", "🇯🇪", "🇯🇲", "🇯🇴", "🇯🇵", "🇰🇪", "🇰🇬", "🇰🇭", "🇰🇮", "🇹🇷", "🇰🇲", "🇰🇳", "🇰🇵", "🇰🇷", "🇰🇼", "🇰🇾", "🇰🇿", "🇱🇦", "🇱🇧", "🇱🇨", "🇱🇮", "🇱🇰", "🇱🇷", "🇱🇸", "🇱🇹", "🇱🇺", "🇱🇻", "🇱🇾", "🇲🇦", "🇲🇨", "🇲🇩", "🇲🇪", "🇲🇫", "🇲🇬", "🇲🇭", "🇲🇰", "🇲🇱", "🇲🇲", "🇲🇳", "🇲🇴", "🇲🇵", "🇲🇶", "🇲🇷", "🇲🇸", "🇲🇹", "🇲🇺", "🇲🇻", "🇲🇼", "🇲🇽", "🇲🇾", "🇲🇿", "🇳🇦", "🇳🇨", "🇳🇪", "🇳🇫", "🇳🇬", "🇳🇮", "🇳🇱", "🇳🇴", "🇳🇵", "🇳🇷", "🇳🇺", "🇳🇿", "🇴🇲", "🇵🇦", "🇵🇪", "🇵🇫", "🇵🇬", "🇵🇭", "🇵🇰", "🇵🇱", "🇵🇲", "🇵🇳", "🇵🇷", "🇵🇸", "🇵🇹", "🇵🇼", "🇵🇾", "🇶🇦", "🇷🇪", "🇷🇴", "🇷🇸", "🇷🇺", "🇷🇼", "🇸🇦", "🇸🇧", "🇸🇨", "🇸🇩", "🇸🇪", "🇸🇬", "🇸🇭", "🇸🇮", "🇸🇯", "🇸🇰", "🇸🇱", "🇸🇲", "🇸🇳", "🇸🇴", "🇸🇷", "🇸🇸", "🇸🇹", "🇸🇻", "🇸🇽", "🇸🇾", "🇸🇿", "🇹🇦", "🇹🇨", "🇹🇩", "🇹🇫", "🇹🇬", "🇹🇭", "🇹🇯", "🇹🇰", "🇹🇱", "🇹🇲", "🇹🇳", "🇹🇴", "🇹🇹", "🇹🇻", "🇹🇼", "🇹🇿", "🇺🇦", "🇺🇬", "🇺🇲", "🇺🇳", "🇺🇾", "🇺🇿", "🇻🇦", "🇻🇨", "🇻🇪", "🇻🇬", "🇻🇮", "🇻🇳", "🇻🇺", "🇼🇫", "🇼🇸", "🇽🇰", "🇾🇪", "🇾🇹", "🇿🇦", "🇿🇲", "🇿🇼", "🏴󠁧󠁢󠁥󠁮󠁧󠁿", "🏴󠁧󠁢󠁳󠁣󠁴󠁿", "🏴󠁧󠁢󠁷󠁬󠁳󠁿", "🏳️‍⚧️"];
?>

<?php include_once "../app/php/head.php"; ?>

<?php $error = @AddPostError($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Добавить пост | Аквариум</title>

<link rel="stylesheet" href="/app/css/pages/add-post.css">

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>Добавить пост</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="person-rightbar-content">
                        <div class="person-setting-bg person-block-add-post">
                            <form class="needs-validation" action="/api/php/person/post/add-post.php" id="formPost" method="post" novalidate>
                                <?php if (empty($error) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <div class="toolbar">
                                        <div>
                                            <button type="button" class="btn" id="toolbar-h" title="Заголовок">
                                                <svg>
                                                    <use xlink:href="/app/img/icons/bootstrap.svg#h-square"></use>
                                                </svg>
                                            </button>
                                            <button type="button" class="btn" id="toolbar-parag" title="Параграф">
                                                <svg>
                                                    <use xlink:href="/app/img/icons/bootstrap.svg#fonts"></use>
                                                </svg>
                                            </button>
                                            <button type="button" class="btn" id="toolbar-bold" title="Жирный">
                                                <svg>
                                                    <use xlink:href="/app/img/icons/bootstrap.svg#type-bold"></use>
                                                </svg>
                                            </button>
                                            <button type="button" class="btn" id="toolbar-italic" title="Курсив">
                                                <svg>
                                                    <use xlink:href="/app/img/icons/bootstrap.svg#type-italic"></use>
                                                </svg>
                                            </button>
                                            <button type="button" class="btn" id="toolbar-monospace" title="Моношрифт">
                                                <svg>
                                                    <use xlink:href="/app/img/icons/bootstrap.svg#code"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="toolbar-smiles col-md-4">
                                            <div>
                                                <button type="button" class="btn" id="toolbar-smile" title="Смайл">😀</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn" id="toolbar-smile" title="Смайл">😁</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn" id="toolbar-smile" title="Смайл">😅</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn" id="toolbar-smile" title="Смайл">😂</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#smilesModal" title="Ещё смайлы">
                                                    <svg width="20" height="20">
                                                        <use xlink:href="/app/img/icons/bootstrap.svg#chevron-down"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="editor" id="editor" contenteditable="true" name="example123" placeholder="Введите текст"></div>
                                </div>
                                <textarea id="textarea" name="text" style="display: none;"></textarea>

                                <button class="btn editor-more" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMore" aria-expanded="false" aria-controls="collapseMore">
                                    <svg>
                                        <use xlink:href="/app/img/icons/bootstrap.min.svg#chevron-down"></use>
                                    </svg>
                                    Дополнительные настройки
                                </button>

                                <div class="collapse editor-collapse" id="collapseMore">
                                    <!-- <p style="margin-bottom: 4px">
                                            Уведомлять о действиях:
                                        </p> -->
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="notif1" name="publicpost" value="1" checked>
                                        <label class="form-check-label" for="notif1">
                                            Публичная запись
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-primary w-100" type="submit">
                                    Добавить пост
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="person-rightbar-empty"></div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="smilesModal" tabindex="-1" aria-labelledby="smilesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Смайлы</h4>
                    <button type="button" class="btn modal-button-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg class="svg-normal" width="20" height="20">
                            <use xlink:href="/app/img/icons/bootstrap.min.svg#x-lg"></use>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container modal-smiles">
                        <h5>Эмодзи</h5>
                        <div class="modal-smiles-block">
                            <?php foreach ($emoji as $s) : ?>
                                <div class="col">
                                    <button type="button" class="btn" id="toolbar-smile" title="Смайл"><?php echo $s ?></button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h5>Люди</h5>
                        <div class="modal-smiles-block">
                            <?php foreach ($people as $s) : ?>
                                <div class="col">
                                    <button type="button" class="btn" id="toolbar-smile" title="Смайл"><?php echo $s ?></button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h5>Предметы</h5>
                        <div class="modal-smiles-block">
                            <?php foreach ($items as $s) : ?>
                                <div class="col">
                                    <button type="button" class="btn" id="toolbar-smile" title="Смайл"><?php echo $s ?></button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h5>Природа</h5>
                        <div class="modal-smiles-block">
                            <?php foreach ($nature as $s) : ?>
                                <div class="col">
                                    <button type="button" class="btn" id="toolbar-smile" title="Смайл"><?php echo $s ?></button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h5>Еда</h5>
                        <div class="modal-smiles-block">
                            <?php foreach ($eat as $s) : ?>
                                <div class="col">
                                    <button type="button" class="btn" id="toolbar-smile" title="Смайл"><?php echo $s ?></button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h5>Активность</h5>
                        <div class="modal-smiles-block">
                            <?php foreach ($activity as $s) : ?>
                                <div class="col">
                                    <button type="button" class="btn" id="toolbar-smile" title="Смайл"><?php echo $s ?></button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h5>Местность</h5>
                        <div class="modal-smiles-block">
                            <?php foreach ($places as $s) : ?>
                                <div class="col">
                                    <button type="button" class="btn" id="toolbar-smile" title="Смайл"><?php echo $s ?></button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h5>Флаги</h5>
                        <div class="modal-smiles-block">
                            <?php foreach ($flags as $s) : ?>
                                <div class="col">
                                    <button type="button" class="btn" id="toolbar-smile" title="Смайл"><?php echo $s ?></button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/app/js/person/leftbarbuttons.js"></script>
    <script src="/app/js/person/formediturl.js"></script>
    <script src="/app/js/confirm-form.js"></script>

    <script src="/app/js/modules/jquery.js"></script>
    <script src="/app/js/person/addpost.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
