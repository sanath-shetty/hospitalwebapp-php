<style>
.footer {
    width: 100%;
    display: flex;
    border-top: 2px solid gray;
    margin-top: 1%;
}
.footer_left {
    width: 30%;
}
p.footer_cont_p {
    font-size: 18px;
    text-align: center;
    font-weight: bold;
    color: #5f3ce3;
}
a.footer_cont_btn {
    background: red;
    padding: 3%;
    text-decoration: none;
    color: white;
}
.footer_middle {
    width: 50%;
}
p.footer_spec_p {
    text-align: center;
    font-weight: bold;
    font-size: 18px;
    color: #5f4be5;
}
.spec_list {
    width: 100%;
    display: flex;
    margin: 0 auto;
}
.spec_list_left {
    width: 50%;
}
.spec_list_right {
    width: 50%;
}
ul.spec_ul {
    list-style-type: none;
    font-size: 15px;
    padding: 0;
    margin: 0;
    font-weight: bold;
}
.spec_ul li {
    margin-bottom: 4%;
}
.footer_right {
    width: 25%;
}
p.footer_adrs_head {
    text-align: center;
    font-weight: bold;
    font-size: 18px;
    color: #5f4be5;
}
p.footer_adrs_p {
    width: 80%;
    margin: 0 auto;
    font-size: 15px;
    font-weight: bold;
    text-align: center;
}
i.fab.fa-whatsapp {
    font-size: 60px;
    color: #644be5;
    margin-left: 18%;
}
i.fas.fa-envelope {
    font-size: 60px;
    color: #644be5;
    margin-left: 5%;
}
i.fab.fa-facebook-square {
    font-size: 60px;
    color: #5f4be5;
    margin-left: 7%;
}
.social_icon {
    width: 100%;
    margin-top: 5%;
}
</style>
<body>
	<div class="footer">
		<div class="footer_left" align="center">
			<p class="footer_cont_p">Have any queries? Contact Us.</p>
			<div style="margin-top: 10%;">
				<a href="contactus.php" class="footer_cont_btn">Got to contact page</a>
			</div>
		</div>
		<div class="footer_middle">
			<p class="footer_spec_p">Our Speciality</p>
            <div class="spec_list">
                <div class="spec_list_left" align="center">
                    <ul class="spec_ul">
                        <li>Cancer Care</li>
                        <li>Neurology</li>
                        <li>Spine Care</li>
                        <li>Urology</li>
                        <li>Physiotherapy</li>
                    </ul>
                </div>
                <div class="spec_list_right" align="center">
                    <ul class="spec_ul">
                        <li>Cardiology</li>
                        <li>Neurosurgery</li>
                        <li>Joint Replacement</li>
                        <li>Dental Care</li>
                    </ul>
                </div>
            </div>
            <p class="footer_spec_p">Services</p>
            <div class="spec_list">
                <div class="spec_list_left" align="center">
                    <ul class="spec_ul">
                        <li>24x7 Pharmacy</li>
                        <li>24x7 Ambulance</li>
                        <li>General Surgery</li>
                    </ul>
                </div>
                <div class="spec_list_right" align="center">
                    <ul class="spec_ul">
                        <li>Blood Bank</li>
                        <li>Home Care</li>
                    </ul>
                </div>
            </div>
		</div>
		<div class="footer_right">
			<p class="footer_adrs_head">Address</p>
            <p class="footer_adrs_p">5th floor, Sanu Palace, Near PVS Circle, Mangalore-575002</p>
            <p class="footer_adrs_head">Contact</p>
            <p class="footer_adrs_p">+91 98540 89432</p>
            <p class="footer_adrs_p">+91 92300 89745</p>
            <div class="social_icon">
                <i class="fab fa-whatsapp"></i>
                <i class="fas fa-envelope"></i>
                <i class="fab fa-facebook-square"></i>
            </div>
		</div>
	</div>
</body>