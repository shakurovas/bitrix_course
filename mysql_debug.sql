
TIME: 0.000267 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft 

SET NAMES 'utf8'

 from Bitrix\Main\DB\Connection->query() /home/bitrix/www/bitrix/modules/main/lib/db/connection.php:376
 from Bitrix\Main\DB\Connection->queryExecute() /home/bitrix/www/bitrix/php_interface/after_connect_d7.php:3
 from include() /home/bitrix/www/bitrix/modules/main/lib/db/connection.php:1016
 from Bitrix\Main\DB\Connection->afterConnected() /home/bitrix/www/bitrix/modules/main/lib/db/mysqliconnection.php:101
 from Bitrix\Main\DB\MysqliConnection->connectInternal() /home/bitrix/www/bitrix/modules/main/lib/data/connection.php:53
 from Bitrix\Main\Data\Connection->getResource() /home/bitrix/www/bitrix/modules/main/classes/general/database.php:283
 from CAllDatabase->DoConnect() /home/bitrix/www/bitrix/modules/main/classes/mysql/database_mysqli.php:73
 from CDatabase->ForSql() /home/bitrix/www/bitrix/modules/main/classes/general/sqlwhere.php:713
----------------------------------------------------------

TIME: 0.000246 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft 

SET collation_connection = "utf8_unicode_ci"

 from Bitrix\Main\DB\Connection->query() /home/bitrix/www/bitrix/modules/main/lib/db/connection.php:376
 from Bitrix\Main\DB\Connection->queryExecute() /home/bitrix/www/bitrix/php_interface/after_connect_d7.php:4
 from include() /home/bitrix/www/bitrix/modules/main/lib/db/connection.php:1016
 from Bitrix\Main\DB\Connection->afterConnected() /home/bitrix/www/bitrix/modules/main/lib/db/mysqliconnection.php:101
 from Bitrix\Main\DB\MysqliConnection->connectInternal() /home/bitrix/www/bitrix/modules/main/lib/data/connection.php:53
 from Bitrix\Main\Data\Connection->getResource() /home/bitrix/www/bitrix/modules/main/classes/general/database.php:283
 from CAllDatabase->DoConnect() /home/bitrix/www/bitrix/modules/main/classes/mysql/database_mysqli.php:73
 from CDatabase->ForSql() /home/bitrix/www/bitrix/modules/main/classes/general/sqlwhere.php:713
----------------------------------------------------------

TIME: 0.003921 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft 

SELECT 1 FROM b_messageservice_message WHERE SUCCESS_EXEC='N' AND (NEXT_EXEC < '2022-03-24 10:00:02' OR NEXT_EXEC IS NULL) LIMIT 1

 from Bitrix\Main\DB\Connection->query() /home/bitrix/www/bitrix/modules/messageservice/lib/queue.php:23
 from Bitrix\MessageService\Queue::hasMessages() /home/bitrix/www/bitrix/modules/messageservice/lib/queue.php:43
 from Bitrix\MessageService\Queue::run() /home/bitrix/www/bitrix/modules/main/classes/general/module.php:480
 from ExecuteModuleEventEx() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3560
 from CAllMain::RunFinalActionsInternal() /home/bitrix/www/bitrix/modules/main/lib/application.php:285
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
 from CAllMain::FinalActions() /home/bitrix/www/bitrix/modules/main/tools/cron_events.php:26
----------------------------------------------------------

TIME: 0.002142 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft CONN: 20304

SELECT 'x'
FROM b_agent
WHERE
	ACTIVE = 'Y'
	AND NEXT_EXEC <= now()
	AND (DATE_CHECK IS NULL OR DATE_CHECK <= now())
	 AND IS_PERIOD='N' 
LIMIT 1

 from CDatabaseMysql->Query() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:63
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
 from CAllMain::FinalActions() /home/bitrix/www/bitrix/modules/main/tools/cron_events.php:26
---------------------------------------------------------------------

TIME: 0.000218 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft 

SELECT GET_LOCK('1bdbb34a87f5ba573840491e84e17ec3b33aed8f3134996703dc39f9a7c95783', 0) as L

 from Bitrix\Main\DB\Connection->query() /home/bitrix/www/bitrix/modules/main/lib/db/mysqlcommonconnection.php:251
 from Bitrix\Main\DB\MysqlCommonConnection->lock() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:66
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
----------------------------------------------------------

TIME: 0.000506 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft CONN: 20304

SELECT ID, NAME, AGENT_INTERVAL, IS_PERIOD, MODULE_ID, RETRY_COUNT FROM b_agent WHERE ACTIVE = 'Y' 	AND NEXT_EXEC <= now() 	AND (DATE_CHECK IS NULL OR DATE_CHECK <= now())  AND IS_PERIOD='N'  ORDER BY RUNNING ASC, SORT desc 

 from CDatabaseMysql->Query() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:111
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
 from CAllMain::FinalActions() /home/bitrix/www/bitrix/modules/main/tools/cron_events.php:26
---------------------------------------------------------------------

TIME: 0.000414 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft CONN: 20304

UPDATE b_agent SET DATE_CHECK = DATE_ADD(now(), INTERVAL 600 SECOND) WHERE ID IN (1, 151)

 from CDatabaseMysql->Query() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:122
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
 from CAllMain::FinalActions() /home/bitrix/www/bitrix/modules/main/tools/cron_events.php:26
---------------------------------------------------------------------

TIME: 0.001816 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft 

SELECT RELEASE_LOCK('1bdbb34a87f5ba573840491e84e17ec3b33aed8f3134996703dc39f9a7c95783') as L

 from Bitrix\Main\DB\Connection->query() /home/bitrix/www/bitrix/modules/main/lib/db/mysqlcommonconnection.php:263
 from Bitrix\Main\DB\MysqlCommonConnection->unlock() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:125
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
----------------------------------------------------------

TIME: 0.000309 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft CONN: 20304

UPDATE b_agent SET RUNNING = 'Y', RETRY_COUNT = RETRY_COUNT+1 WHERE ID = 1

 from CDatabaseMysql->Query() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:152
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
 from CAllMain::FinalActions() /home/bitrix/www/bitrix/modules/main/tools/cron_events.php:26
---------------------------------------------------------------------

TIME: 0.001806 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft 

SELECT 
	`main_analytics_counter_data`.`ID` AS `ID`,
	`main_analytics_counter_data`.`TYPE` AS `TYPE`,
	`main_analytics_counter_data`.`DATA` AS `DATA`
FROM `b_counter_data` `main_analytics_counter_data` 

ORDER BY `ID` ASC
LIMIT 0, 50


 from Bitrix\Main\DB\Connection->query() /home/bitrix/www/bitrix/modules/main/lib/orm/query/query.php:3558
 from Bitrix\Main\ORM\Query\Query->query() /home/bitrix/www/bitrix/modules/main/lib/orm/query/query.php:952
 from Bitrix\Main\ORM\Query\Query->exec() /home/bitrix/www/bitrix/modules/main/lib/orm/data/datamanager.php:513
 from Bitrix\Main\ORM\Data\DataManager::getList() /home/bitrix/www/bitrix/modules/main/lib/analytics/counterdata.php:77
 from Bitrix\Main\Analytics\CounterDataTable::submitData() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php(163) : eval()'d code:1
 from eval() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:163
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
----------------------------------------------------------

TIME: 0.000491 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft CONN: 20304

UPDATE b_agent SET
	NAME = '\\Bitrix\\Main\\Analytics\\CounterDataTable::submitData();',
	LAST_EXEC = now(),
	NEXT_EXEC = DATE_ADD(now(), INTERVAL 60 SECOND),
	DATE_CHECK = NULL,
	RUNNING = 'N',
	RETRY_COUNT = 0
WHERE ID = 1

 from CDatabaseMysql->Query() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:210
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
 from CAllMain::FinalActions() /home/bitrix/www/bitrix/modules/main/tools/cron_events.php:26
---------------------------------------------------------------------

TIME: 0.001919 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft CONN: 20304

UPDATE b_agent SET RUNNING = 'Y', RETRY_COUNT = RETRY_COUNT+1 WHERE ID = 151

 from CDatabaseMysql->Query() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:152
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
 from CAllMain::FinalActions() /home/bitrix/www/bitrix/modules/main/tools/cron_events.php:26
---------------------------------------------------------------------

TIME: 0.001644 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft CONN: 20304

SELECT
	R.ID
	,R.NAME
	,R.CODE
	,R.SORT
	,R.LID
	,R.ACTIVE
	,R.DESCRIPTION
	,R.AUTO
	,R.VISIBLE
	,DATE_FORMAT(R.LAST_EXECUTED, '%d.%m.%Y %H:%i:%s') AS LAST_EXECUTED
	,R.FROM_FIELD
	,R.DAYS_OF_MONTH
	,R.DAYS_OF_WEEK
	,R.TIMES_OF_DAY
	,R.TEMPLATE
FROM
	b_list_rubric R
WHERE R.ACTIVE = 'Y'
AND R.AUTO = 'Y'
ORDER BY R.ID DESC

 from CDatabaseMysql->Query() /home/bitrix/www/bitrix/modules/subscribe/classes/general/rubric.php:89
 from CRubric::GetList() /home/bitrix/www/bitrix/modules/subscribe/classes/general/template.php:77
 from CPostingTemplate::Execute() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php(163) : eval()'d code:1
 from eval() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:163
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
---------------------------------------------------------------------

TIME: 0.002085 SESSION: 0s6eeDLwsqTKBoSWi6MjVs93oFzpDZft CONN: 20304

UPDATE b_agent SET
	NAME = 'CPostingTemplate::Execute();',
	LAST_EXEC = now(),
	NEXT_EXEC = DATE_ADD(now(), INTERVAL 60 SECOND),
	DATE_CHECK = NULL,
	RUNNING = 'N',
	RETRY_COUNT = 0
WHERE ID = 151

 from CDatabaseMysql->Query() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:210
 from CAgent::ExecuteAgents() /home/bitrix/www/bitrix/modules/main/classes/mysql/agent.php:21
 from CAgent::CheckAgents()
 from call_user_func_array() /home/bitrix/www/bitrix/modules/main/lib/application.php:690
 from Bitrix\Main\Application->runBackgroundJobs() /home/bitrix/www/bitrix/modules/main/lib/application.php:294
 from Bitrix\Main\Application->terminate() /home/bitrix/www/bitrix/modules/main/lib/application.php:261
 from Bitrix\Main\Application->end() /home/bitrix/www/bitrix/modules/main/classes/general/main.php:3526
 from CAllMain::FinalActions() /home/bitrix/www/bitrix/modules/main/tools/cron_events.php:26
---------------------------------------------------------------------
