-- after insert on Order (check id client and check id courier - ensure 
-- they are both what they are supposed to be)
PRAGMA foreign_keys = ON; 

drop trigger if exists checkIDClient; 

create trigger checkIDClient
before insert on Orders 
when (not (New.id_client in Client))
begin 
    select raise(ignore); 
end; 


