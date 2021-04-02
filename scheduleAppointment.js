function scheduleAppointment(patient patientSelected, int daysUntilNextAppointment) {
	var currentDate = new Date();
	patientSelected.appointmentDate() = currentDate.addDays(daysUntilNextAppointment);
	updatePatientInfo(patientSelected);
	//display to admins alert(patientSelected.appointmentDate, patientSelected.firstName, patientSelected.lastName);
}