ACTIVITY LOG
* For each client and case -- show 'most recent' with option to 'show all'
* User has their personal activity log on their account page.
* Create Non-Normalized tables:

[Attribute_Change]
	Attribute_Change_ID
	User_ID
	Kasus_ID
	Klien_ID
	Attribute_Name
	Old_Attribute_Value
	New_Attribute_Value
	Timestamps

[Activity]
	Activity_ID
	User_ID
	Kasus_ID
	Klien_ID
	Action
	Timestamps

SOFTDELETES
* Soft delete (aka move to bin)
	- kasus
	- klien
	- klien_kasus
* Administration page for emptying the bin
