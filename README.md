**Explanations**

The “MedCare” app has various key uses in making it easier to manage healthcare efficiently and in an integrated manner. Through “MedCare,” users can easily make doctor's appointments, book hospitalizations, purchase medications, and search for hospital locations, all in one intuitive platform. In addition, the app provides quick access to medical history and personalized health reminders, which helps patients maintain consistency in their care. With strong data security features, “MedCare” guarantees the confidentiality of users' health information, increasing confidence in its use. Special features for doctors, such as monitoring appointment schedules and room availability, improve the efficiency of healthcare services, so that the app is not just a digital tool, but a partner that facilitates the relationship between patients and medical personnel, and brings modern, planned, and more environmentally friendly healthcare solutions.

**ER Diagram (ERD)**

![image](https://github.com/user-attachments/assets/9c1f8480-ce58-451e-b0e4-3af9e283bfd2)

**Prototype Design**

**Doctor**

![image](https://github.com/user-attachments/assets/99f7b985-334a-4d63-8e42-433bc1af1405)

On this display is a login menu consisting of email and password. What distinguishes doctors and patients is their email.

![image](https://github.com/user-attachments/assets/a541efaa-3acf-48e2-a1a8-d6d3a19dd0f6)

On the display is the main menu display which has an appointment, and room. There is a logout button, which is useful for doctors if they are no longer using the application.

![image](https://github.com/user-attachments/assets/f3a7cfe0-83b2-4208-af6a-198dc25d16f6)

In the display is the appointment menu display which has an “Active Appoint” button which is useful for issuing a list of active appointments that have been made by patients. The contents of the list are id, patient name, date, email, and appointment status.

![image](https://github.com/user-attachments/assets/4154a7f8-c3c3-43d8-812e-c157c0f1754d)

This is an appointment detail display in the form of an alert dialog, which is useful for accepting/rejecting appointments with patients.

![image](https://github.com/user-attachments/assets/e63c4186-bb14-45cf-b12a-9aa32b4601c6)

On the display is a Room menu display which has a “Show Room” button which is useful for issuing a list of rooms that are currently active or used by patients.

**Patient**

![image](https://github.com/user-attachments/assets/41bf2f7d-8bff-43a6-89ac-9342b8725549)

On this display is a login menu consisting of email and password. What distinguishes doctors and patients is their email. There is also a register menu for those who do not have an account.

![image](https://github.com/user-attachments/assets/68e9083f-3b4c-48af-bf8a-0fb9e225edcd)

On this display is a register menu consisting of name, date of birth, address, telephone number, email, and password. If you have filled in everything, the user can press the register button. If the user already has an account, the user can press the cancel button on the top left.

![image](https://github.com/user-attachments/assets/425fb932-642a-41c9-b574-d01f886963fd)

On the display is the main menu display which contains appointment, order room, medicine, find hospital, and history. There is a help button, which is useful for users who do not know how to buy medicine, how to call an ambulance, and others. If the patient is no longer using the application, they can press the red “logout” button on the top left.

![image](https://github.com/user-attachments/assets/ad14ed94-e928-4b35-b5b2-757c971132ea)

On the display is a help menu that is useful for patients who do not know how to choose medicine, how to perform CPR, and how to call an ambulance. The display that will come out on this menu is in the form of a video.

![image](https://github.com/user-attachments/assets/a27fc78c-2cfe-444b-81d9-aaef219782b6)

On this display is an appointment menu display consisting of name and appointment date. Users can press the submit button if they have filled in everything. Users can also see the Active Appointment in the form of a listview by pressing the button. It will output the name, appointment date, and appointment status.

![image](https://github.com/user-attachments/assets/41e4372d-a4eb-4a2e-bf4a-1d134a4545e1)

This is an active appointment view that can be edited and deleted. On edit, you can change the name and date of the appointment.

![image](https://github.com/user-attachments/assets/9b06107c-08ec-4a02-a590-575180a6200b)

On this display is a display that is useful for users if they want to choose / book a room for inpatient care by entering their name and choosing the total room they want to book. If so, the user can press the “submit” button. Users can also see the room booked by pressing the “show room” button. In the “show room” there is the name and number of rooms booked.

![image](https://github.com/user-attachments/assets/bf93d144-9cd5-4ab2-ba60-bd27b9ec81f6)

On this display is a medicine menu display that has a listview of medicines. Users can buy drugs on this medicine menu by pressing the “order” button.

![image](https://github.com/user-attachments/assets/4885a0a9-e28a-47fb-a6ca-6ad4cb29230c)

This display is a confirmation display of the selected drug purchase. Confirmation of drug purchases in the form of a dialog alert.

![image](https://github.com/user-attachments/assets/94915478-645c-4d4c-83f8-b855e190b11b)

On this display is a find hospital display which consists of a map view that the user can see. In this map view, the closest hospital to the user will appear.

![image](https://github.com/user-attachments/assets/e554d96c-487d-407f-8eb4-1ced94e89ed4)

On this display is a history menu display which consists of a listview. The listview contains a history of appointments, room orders, and others that have been done before.



