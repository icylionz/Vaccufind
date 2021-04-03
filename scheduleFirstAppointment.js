function scheduleFirstAppointment(Patient patientSelected) {
	var timeTilAppointment;
	//read untilappointment from admin settings file

	if (patientSelected.appointmentDate == " ") {
		scheduleAppointment(patientSelected, timeTilAppointment);
	}
}