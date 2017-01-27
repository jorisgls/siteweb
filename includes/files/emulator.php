<?php 
switch(Settings('Emulator')) {
    case 'Phoenix':
        define('BanSQL','bans');
        define('ChatLogSQL','chatlogs');
        define('RoomSQL','rooms');
        define('StaffLogSQL','cmdlogs');
        define('BadgeSQL','user_badges');
        break;
    case 'Butterfly':
        define('BanSQL','bans');
        define('ChatLogSQL','chatlogs');
        define('RoomSQL','rooms');
        define('StaffLogSQL','staff_logs');
        define('BadgeSQL','user_badges');
        break;
    case 'Mercury':
        define('BanSQL','bans');
        define('ChatLogSQL','chatlogs');
        define('RoomSQL','rooms');
        define('StaffLogSQL','staff_logs');
        define('BadgeSQL','user_badges');
        break;
        case 'Azure':
        define('BanSQL','users_bans');
        define('ChatLogSQL','users_chatlogs');
        define('RoomSQL','rooms_data');
        define('StaffLogSQL','server_stafflogs');
        define('BadgeSQL','users_badges');
        break;
    default:
       define('BanSQL','bans');
        define('ChatLogSQL','chatlogs');
        define('RoomSQL','rooms');
        define('StaffLogSQL','staff_logs');
        define('BadgeSQL','user_badges');
}
$table = array( 
		'BanSQL'	=> BanSQL,
		'ChatLogSQL'	=> ChatLogSQL,
		'RoomSQL'	=> RoomSQL,
		'StaffLogSQL'	=> StaffLogSQL,
		'BadgeSQL'	=> BadgeSQL
);
?>