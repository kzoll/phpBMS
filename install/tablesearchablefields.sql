INSERT INTO tablesearchablefields VALUES (3,9,'(users.lastname like \"{{value}}%\" or users.firstname like \"{{value}}%\" )','name',0,'whereclause');
INSERT INTO tablesearchablefields VALUES (5,9,'users.accesslevel','access level',2,'field');
INSERT INTO tablesearchablefields VALUES (6,9,'users.login','log in name',1,'field');
INSERT INTO tablesearchablefields VALUES (7,9,'users.id','id',3,'field');
INSERT INTO tablesearchablefields VALUES (8,11,'tabledefs.maintable','main table',0,'field');
INSERT INTO tablesearchablefields VALUES (9,11,'tabledefs.displayname','display',1,'field');
INSERT INTO tablesearchablefields VALUES (10,11,'tabledefs.id','id',2,'field');
INSERT INTO tablesearchablefields VALUES (70,21,'modules.id','id',0,'field');
INSERT INTO tablesearchablefields VALUES (26,10,'relationships.id','id',0,'field');
INSERT INTO tablesearchablefields VALUES (27,16,'reports.name','name',0,'field');
INSERT INTO tablesearchablefields VALUES (28,16,'reports.reporttable','table',1,'field');
INSERT INTO tablesearchablefields VALUES (29,16,'reports.type','type',2,'field');
INSERT INTO tablesearchablefields VALUES (30,16,'reports.id','id',3,'field');
INSERT INTO tablesearchablefields VALUES (31,17,'usersearches.name','name',0,'field');
INSERT INTO tablesearchablefields VALUES (32,17,'({{value]]=\"global\" or users.firstname like \"{{value}}%\" or users.lastname like \"{{value}}%\")','user',1,'whereclause');
INSERT INTO tablesearchablefields VALUES (33,17,'usersearches.table','table',2,'field');
INSERT INTO tablesearchablefields VALUES (34,17,'usersearches.id','id',3,'field');
INSERT INTO tablesearchablefields VALUES (35,12,'notes.subject','title',0,'field');
INSERT INTO tablesearchablefields VALUES (36,12,'notes.content','content',2,'field');
INSERT INTO tablesearchablefields VALUES (39,12,'notes.id','id',5,'field');
INSERT INTO tablesearchablefields VALUES (81,12,'notes.category','category',1,'field');
INSERT INTO tablesearchablefields VALUES (83,23,'notes.subject','title',0,'field');
INSERT INTO tablesearchablefields VALUES (84,23,'notes.category','category',1,'field');
INSERT INTO tablesearchablefields VALUES (85,23,'notes.content','content',2,'field');
INSERT INTO tablesearchablefields VALUES (88,23,'notes.id','id',5,'field');
INSERT INTO tablesearchablefields VALUES (89,24,'notes.subject','title',0,'field');
INSERT INTO tablesearchablefields VALUES (90,24,'notes.category','category',1,'field');
INSERT INTO tablesearchablefields VALUES (91,24,'notes.content','content',2,'field');
INSERT INTO tablesearchablefields VALUES (94,24,'notes.id','id',5,'field');
INSERT INTO tablesearchablefields VALUES (67,19,'menu.name','name',0,'field');
INSERT INTO tablesearchablefields VALUES (68,19,'parentmenu.name','parent name',1,'field');
INSERT INTO tablesearchablefields VALUES (69,19,'menu.id','id',2,'field');