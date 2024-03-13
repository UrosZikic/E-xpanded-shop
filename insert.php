<?php
require_once "connection.php";

$query = "INSERT INTO `products` (name, quantity, image, price, category, device, description) VALUES
('Cyberpunk', 20, 'cyberpunk', 9.99, 'RPG', 'PC', 'Cyberpunk 2077 is an open-world, action-adventure ...'),
('Tiny Tina_z Wonderlands', 20, 'wonderlands', 9.99, 'adventure', 'PC', 'Embark on an epic adventure full of whimsy, wonder...'),
('2K23', 20, '2k23', 9.99, 'sport', 'XBOX', 'WWE 2K23 is Even Stronger with expanded features, ...'),
('NFS HEAT', 20, 'nfs', 9.99, 'sport', 'PS4', 'Hustle by day and risk it all at night in Need for...'),
('BIOSHOCK', 20, 'bioshock', 8.99, 'action', 'PS4', 'BioShock is a shooter unlike any other, loaded wit...'),
('Civilization: VI', 20, 'civ6', 8.99, 'adventure', 'PC', 'Civilization VI is the newest installment in the a...'),
('Diablo IV', 20, 'diablo', 8.99, 'horror', 'PS4', 'Join the fight for Sanctuary in Diablo IV, the ult...'),
('Hollow', 0, 'hollow', 9.99, 'horror', 'XBOX', '“I didn''t care about this ship… facility… whatever..');";


$query .= "INSERT INTO `products_regular` (id, name, quantity, image, price, category, device, description) VALUES
(1, 'Marvel_z Spider-Man', 20, 'Marvels Spider-Man', 39.99, 'action, adventure', 'PS4, PC, XBOX', 'Swing through the city as Spider-Man, battling villains and saving the day in this thrilling adventure.'),
(2, 'Sons of the Forest', 0, 'sons of the forest', 29.99, 'horror', 'XBOX, nintendo, PC', 'Explore a mysterious island, uncovering its dark secrets and surviving against terrifying creatures.'),
(3, 'Assassin_z Creed: Valhalla', 20, 'ac valhalla', 59.99, 'RPG, adventure, action', 'PC, PS4, XBOX, nintendo', 'Embark on an epic Viking saga, raiding villages and forging alliances in a quest for glory.'),
(4, 'Batman: Arkham Knight', 20, 'batman ak', 19.99, 'action', 'PC, PS4, XBOX, nintendo', `Become the Dark Knight and face off against Gotham's most notorious villains in this action-packed adventure.`),
(5, 'Call of Duty: Modern Warfare', 20, 'call of duty', 59.99, 'action', 'XBOX, PC, PS4', 'Experience the thrill of modern combat in a gripping single-player campaign or intense multiplayer battles.'),
(6, 'Counter-Strike: Global Offensive 2', 20, 'counter-strike', 14.99, 'action', 'PC', 'Join the global phenomenon of tactical team-based combat in this classic FPS game.'),
(7, 'Day Z', 20, 'dayz', 29.99, 'action', 'PC', 'Survive and explore in a post-apocalyptic world filled with danger, zombies, and other players.'),
(8, 'Dead by Daylight', 20, 'dead by daylight', 19.99, 'horror, action', 'PS4', 'Experience the ultimate asymmetrical multiplayer horror game, where one player hunts the rest.'),
(9, 'Doom: Eternal', 20, 'doom', 39.99, 'horror', 'XBOX', 'Rip and tear through hordes of demons in this adrenaline-fueled FPS adventure.'),
(10, 'GTA: V', 0, 'gta v', 29.99, 'RPG', 'PS4', 'Enter the sprawling open-world of Los Santos and build your criminal empire in this action-packed adventure.'),
(11, 'Last Epoch', 20, 'last epoch', 24.99, 'action', 'XBOX', 'Uncover ancient mysteries and shape the future in this epic action RPG.'),
(12, 'Left for Dead 2', 20, 'left for dead 2', 19.99, 'horror', 'PC', 'Survive against hordes of zombies with friends in this intense co-op shooter.'),
(13, 'Fallout 76', 20, 'fallout 76', 39.99, 'RPG, action, adventure, horror', 'XBOX, PC', 'Explore the wasteland, build settlements, and uncover the secrets of post-apocalyptic America.'),
(14, 'Lies of P', 20, 'lies of p', 34.99, 'RPG', 'PS4', 'Embark on a perilous journey through a dark and mysterious world in this challenging souls-like RPG.'),
(15, 'Sea of Thieves', 20, 'sea of thieves', 39.99, 'action', 'PS4', 'Sail the high seas, plunder treasure, and engage in epic naval battles with friends in this pirate adventure.'),
(16, 'Dusk', 20, 'dusk', 19.99, 'Horror', 'PC', 'Experience fast-paced retro FPS action in this homage to classic shooters.'),
(17, 'Elden Ring', 20, 'elden ring', 59.99, 'RPG', 'PS4', 'Enter a world of myth and legend, where the fate of the lands is in your hands in this highly anticipated action RPG.'),
(18, 'Dota 2', 0, 'dota 2', 0, 'sport', 'PC', 'Join the world’s largest battle arena and compete in intense multiplayer matches.'),
(19, 'Dying Light', 20, 'dying light', 39.99, 'horror', 'PC', 'Parkour through a zombie-infested city and survive against the infected in this open-world survival horror game.'),
(20, 'The Quarry', 20, 'the quarry', 24.99, 'horror', 'PC', 'Uncover the chilling secrets of an abandoned quarry in this atmospheric horror game.'),
(21, 'Elder Scroll: Skyrim', 20, 'skyrim', 29.99, 'RPG', 'nintendo', 'Journey through a vast open world, slaying dragons and shaping the fate of Skyrim.'),
(22, 'Sekiro', 20, 'sekiro', 59.99, 'adventure', 'PS4', 'Carve your own path to vengeance in this challenging action-adventure game from the creators of Dark Souls.'),
(23, 'Resident Evil: Village', 20, 'res village', 49.99, 'horror', 'nintendo', 'Explore a mysterious village plagued by grotesque creatures in this latest installment of the Resident Evil series.'),
(24, 'Palworld', 20, 'palworld', 29.99, 'adventure', 'nintendo', 'Embark on a whimsical adventure, capturing creatures and building your own unique world.'),
(25, 'Pacific Drive', 20, 'pacific drive', 24.99, 'adventure', 'PS4', 'Brave the dangers of a haunted highway and unravel its dark mysteries in this atmospheric adventure game.'),
(26, 'Outlast Trials', 0, 'outlast trials', 39.99, 'horror', 'PC', 'Survive against unspeakable horrors in this chilling cooperative multiplayer experience.'),
(27, 'Elder Scroll: Oblivion', 20, 'oblivion', 19.99, 'adventure', 'nintendo', 'Step into the shoes of the Hero of Kvatch and save the world from the demonic invasion in this classic RPG.'),
(28, 'No Man_z Sky', 20, 'no man\'s sky', 59.99, 'adventure', 'nintendo', 'Embark on an epic journey of exploration and discovery across a procedurally generated universe.'),
(29, 'NBA2K24', 20, 'nba2k24', 59.99, 'sport', 'XBOX', 'Experience the excitement of basketball like never before in this realistic sports simulation.'),
(30, 'Mortal Kombat I', 20, 'mk 1', 19.99, 'sport', 'PS4', 'Enter the arena and unleash brutal finishing moves in this iconic fighting game.'),
(31, 'Injustice 2', 20, 'injustice 2', 49.99, 'sport', 'PS4', 'Build and customize your ultimate DC superhero or villain and battle in epic clashes.'),
(32, 'FIFA24', 20, 'fifa 24', 59.99, 'sport', 'PC', 'Take to the pitch and compete in thrilling soccer matches'),
(33, 'Farcry 6', 20, 'farcry 6', 59.99, 'adventure', 'PS4', 'Explore a lush and dangerous tropical island as you fight to liberate your homeland from a ruthless dictator.'),
(34, 'Dark Souls III', 0, 'dark souls', 59.99, 'RPG', 'XBOX', 'Journey through a dark and unforgiving world filled with fearsome enemies and challenging boss battles.'),
(35, 'Baldur_z Gate', 20, 'baldur\'s gate', 49.99, 'RPG', 'PC', 'Immerse yourself in a rich fantasy world filled with intrigue, danger, and adventure in this classic RPG series.'),
(36, 'Assassin_z Creed: Odyssey', 20, 'ac odyssey', 59.99, 'RPG', 'PC', 'Embark on an epic journey in ancient Greece, shaping your own destiny as a legendary Spartan hero.'),
(37, 'Among Us', 20, 'among_us', 4.99, 'action', 'PC', 'Solve the mystery of who among your crewmates is the impostor in this thrilling online multiplayer game.'),
(38, 'Terraria', 20, 'terraria', 9.99, 'adventure', 'PC', 'Delve into vast underground caverns, build mighty fortresses, and battle fearsome monsters in this sandbox adventure.'),
(39, 'Stardew Valley', 20, 'stardew_valley', 14.99, 'adventure, simulation', 'PC', 'Escape to the countryside and build the farm of your dreams while interacting with charming villagers in this relaxing simulation game.'),
(40, 'Rocket League', 20, 'rocket_league', 19.99, 'sport, action', 'PC', 'Score incredible goals and perform amazing aerial maneuvers in this high-octane blend of soccer and vehicular mayhem.'),
(41, 'Rainbow Six Siege', 20, 'rainbow_six_siege', 19.99, 'action', 'PC', 'Lead your team of operators in intense tactical combat, utilizing gadgets and strategy to outsmart your opponents.'),
(42, 'Team Fortress 2', 20, 'team_fortress_2', 0, 'action', 'PC', 'Join the ultimate online war between RED and BLU teams, each with its own unique classes and abilities.'),
(43, 'The Witcher 3: Wild Hunt', 20, 'witcher_3', 29.99, 'RPG', 'PC', 'Embark on a quest for vengeance and redemption in a war-torn world filled with monsters, magic, and political intrigue.'),
(44, 'Portal 2', 20, 'portal_2', 9.99, 'puzzle', 'PC', 'Master the use of portals and solve mind-bending puzzles in this award-winning first-person puzzle game.'),
(45, 'Rust', 20, 'rust', 39.99, 'action, adventure', 'PC', 'Survive against harsh environments, hostile wildlife, and even more dangerous players in this unforgiving multiplayer sandbox.'),
(46, 'PlayerUnknown\'s Battlegrounds', 20, 'pubg', 29.99, 'action', 'PC', 'Be the last one standing in a thrilling battle royale experience, scavenging for weapons and outwitting your opponents.'),
(47, 'Fall Guys: Ultimate Knockout', 20, 'fall_guys', 19.99, 'action', 'PC', 'Compete in hilarious obstacle courses and wacky mini-games in this chaotic multiplayer party game.'),
(48, 'Counter-Strike 1.6', 20, 'cs_1.6', 9.99, 'action', 'PC', 'Experience the iconic multiplayer shooter that revolutionized the FPS genre with its fast-paced action and strategic gameplay.')

$query .= `INSERT INTO `products_regular` (id, name, quantity, image, price, category, device, description)
VALUES
(49, 'Assassin_z Creed', 20, 'assassins_creed', 19.99, 'action, adventure', 'PC', 'Step into the shoes of Altair, an elite assassin during the Third Crusade, and uncover the secrets of the ancient order of Assassins.'),
(50, 'Half-Life: Alyx', 20, 'half_life_alyx', 59.99, 'action, adventure', 'PC', 'Step into the immersive world of Half-Life in this groundbreaking VR experience, set between the events of Half-Life and Half-Life 2.'),
(51, 'Assassin_z Creed II', 20, 'assassins_creed_2', 19.99, 'action, adventure', 'PC', 'Follow the journey of Ezio Auditore da Firenze, a young nobleman turned assassin, as he seeks vengeance against those who betrayed his family.'),
(52, 'Celeste', 20, 'celeste', 19.99, 'action, adventure', 'Nintendo', 'Embark on a journey of self-discovery as you help Madeline navigate through challenging levels filled with platforming obstacles and personal struggles.'),
(53, 'Assassin_z Creed: Brotherhood', 20, 'assassins_creed_brotherhood', 19.99, 'action, adventure', 'PC', 'Continue Ezio\'s story as he leads the Brotherhood against the Templar threat in Renaissance Italy, forging alliances and expanding Assassin influence.'),
(54, 'Hollow Knight', 20, 'hollow_knight', 14.99, 'action, adventure', 'PS4', 'Explore the vast interconnected world of Hallownest, filled with mysteries, challenging enemies, and beautiful hand-drawn landscapes.'),
(55, 'Assassin_z Creed: Revelations', 20, 'assassins_creed_revelations', 19.99, 'action, adventure', 'PC', 'Witness the epic conclusion of Ezio\'s journey as he travels to Constantinople, uncovering the secrets of the Assassin Order and confronting his own destiny.'),
(56, 'Disco Elysium', 20, 'disco_elysium', 39.99, 'RPG, adventure', 'PC', 'Immerse yourself in a groundbreaking narrative-driven RPG, where every choice you make shapes the story and your character\'s destiny.'),
(57, 'Assassin_z Creed III', 20, 'assassins_creed_3', 19.99, 'action, adventure', 'PC', 'Experience the American Revolution through the eyes of Connor, a Native American assassin fighting for justice and freedom in the colonies.'),
(58, 'Subnautica', 20, 'subnautica', 24.99, 'adventure, horror, survival', 'Xbox', 'Dive into an alien underwater world, gather resources, craft equipment, and survive the dangers lurking beneath the surface in this captivating survival horror game.'),
(59, 'Assassin_z Creed IV: Black Flag', 20, 'assassins_creed_4_black_flag', 19.99, 'action, adventure', 'PC', 'Sail the Caribbean seas as Edward Kenway, a pirate-turned-assassin, and uncover the truth behind the mysterious precursor artifacts.'),
(60, 'Into the Breach', 20, 'into_the_breach', 14.99, 'strategy, RPG', 'PC', 'Command powerful mechs from the future and defend humanity against relentless alien attacks in this turn-based tactical strategy game.')`";

$query .= "INSERT INTO `products_regular` (id, name, quantity, image, price, category, device, description) VALUES
(61, 'Hades', 20, 'hades', 24.99, 'action, adventure', 'PC', 'Descend into the underworld and battle your way through hordes of mythical creatures in this critically acclaimed roguelike action RPG.'),
(62, 'Monster Hunter: World', 20, 'monster_hunter_world', 59.99, 'action, adventure', 'PC', 'Hunt gigantic monsters in a lush, living ecosystem and craft powerful gear to take on even greater challenges in this expansive action RPG.'),
(63, 'Divinity: Original Sin 2', 20, 'divinity_original_sin_2', 44.99, 'RPG, adventure', 'PC', 'Gather your party and embark on a sprawling adventure through a rich fantasy world filled with deep strategic gameplay and meaningful choices.'),
(64, 'Mount & Blade: Warband', 20, 'mount_and_blade_warband', 19.99, 'action, RPG', 'PC', 'Lead your army to victory in epic medieval battles, build your kingdom, and forge alliances in this classic sandbox RPG experience.'),
(65, 'Grim Dawn', 20, 'grim_dawn', 24.99, 'RPG, action', 'PC', 'Unleash your inner demon slayer in this gritty action RPG, where you must survive in a world ravaged by darkness and chaos.'),
(66, 'Risk of Rain 2', 20, 'risk_of_rain_2', 24.99, 'action, adventure', 'PC', 'Team up with friends and survive an ever-changing alien world filled with deadly creatures and challenging bosses in this thrilling roguelike shooter.'),
(67, 'Slay the Spire', 20, 'slay_the_spire', 24.99, 'strategy, card game', 'PC', 'Climb the ever-shifting Spire and craft a unique deck of cards to battle deadly enemies and powerful bosses in this addictive roguelike card game.'),
(68, 'RimWorld', 20, 'rimworld', 34.99, 'simulation, strategy', 'PC', 'Manage a colony of survivors on a distant planet, building, crafting, and surviving against the challenges of an unpredictable world in this complex and engaging simulation game.'),
(69, 'Factorio', 20, 'factorio', 29.99, 'simulation, strategy', 'PC', 'Design and manage automated factories to produce complex machinery and fend off hostile creatures in this addictive sandbox management game.'),
(70, 'Mount & Blade II: Bannerlord', 20, 'mount_and_blade_2_bannerlord', 49.99, 'action, RPG', 'PC', 'Lead your army to victory in epic medieval battles, build your kingdom, and forge alliances in this highly anticipated sequel to Mount & Blade.'),
(71, 'Stellaris', 20, 'stellaris', 39.99, 'strategy, simulation', 'PC', 'Build and expand your galactic empire, engage in diplomacy, and conquer the stars in this deep and immersive grand strategy game set in space.'),
(72, 'Age of Empires II: Definitive Edition', 20, 'age_of_empires_2_definitive_edition', 19.99, 'strategy', 'PC', 'Relive the classic real-time strategy game with updated graphics, new civilizations, and enhanced gameplay in this definitive edition of Age of Empires II.');";


$result = $conn->query($query);
