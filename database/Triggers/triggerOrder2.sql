-- after insert on Order (check if order products belong only to one 
-- Restaurant)
PRAGMA foreign_keys = ON; 

drop trigger if exists checkOrderProducts; 

create trigger checkOrderProducts
before insert on Products_Orders
begin
    select raise(ignore); 
end; 