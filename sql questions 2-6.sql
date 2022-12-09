
######################################################################################
#4 create a view that has name and specialty of all doctors

select doctor.First_Name, doctor.Last_Name, Specialty.specialty
from Doctor, specialty
where doctor.doctorid = specialty.doctorid and Specialty.specialty is not null;

######################################################################################
#5 modify the view for q4

select doctor.first_name, doctor.Last_name, specialty.specialty
from doctor, specialty
where doctor.doctorid = specialty.doctorid;

######################################################################################
#6 Create a trigger on the Doctor specialty....

drop trigger if exists DoctorSpecialty;
drop trigger if exists Doctorspecialty_update;

delimiter #
create trigger DoctorSpecialty after insert on Doctor
for each row begin
insert into Audit(DoctorID, Doctor_Name, Action, Specialty, Date_Modified) values (new.doctorid, NEW.`First_Name`, "added", NEW.Specialty, curdate());
end #

create trigger Doctorspecialty_update after update on Doctor
for each row begin
insert into Audit(DoctorID, Doctor_Name, Action, Specialty, Date_Modified) values (new.doctorid, NEW.`First_Name`, "updated", NEW.Specialty, curdate());
end #
delimiter ;
