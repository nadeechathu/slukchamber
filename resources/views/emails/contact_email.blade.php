<html lang="en">
  <head>
    <!--  HEAD    -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enquiry Form</title>

    <style>
        body {
            font-family: Poppins, sans-serif;
            padding:20px;
            background: #f1f1f1;
            }

            .container_div {
            /* background-color: #000000; */
            width:80%;
            max-width:600px;
            margin-left:auto;
            margin-right:auto;
            }

            .inner_container {
            background-color:#ffffff;
            padding:50px;
            }

            header, footer {
            text-align:center;
            }

            .email_inner_section {
            padding:20px 0 50px 0;
            }

            hr {
            height:5px;
            background-color: black;
            border-color: black;
            }

            .enquiry_submission table {
            margin-top:50px;
            }

            .enquiry_submission table tbody tr th {
            width: 30%;
            vertical-align:top;
            }

            .enquiry_submission th, .enquiry_submission td {
            padding: 10px;
            margin:0;
            }

            .enquiry_submission th {
            color: black;
            font-weight:900;
            }

            .enquiry_submission td {
            font-weight:100;
            }

            .email_footer {
            font-size:10px;
            color: #000000;
            padding:20px 0;
            text-align: center;
            }

            .email_footer a {
            color: #000000;
            text-decoration:none;
            }

            .text-align-center {
                text-align: center !important;
            }

            @media only screen and (max-width:500px){
            .enquiry_submission th, .enquiry_submission td {
                display: block;
                width: 100% !important;
            }
            }
    </style>
  </head>
  <!-- BODY   -->
  <body>
    <div class="container_div">
      <div class="inner_container">
        <center>
        <header>
        <img src="{{ asset('themes/default/images/logo.png') }}" width="100px"/>
        <h1 class="text-align-center">Inquiry Information</h1>
        </header>
        </center>
        <hr>
        <div class="email_content">
        <div class="email_inner_section">
            @if($details['admin_alert'] == 1)
          <section>
          <h3>Hi Admin, you have a new inquiry from {{$details['inquiry']['full_name']}}.</h3>
          </section>
          @endif
          <section class="enquiry_submission">
          <table>
            <tbody>
              <tr>
                <th>Client Name</th>
                <td>{{$details['inquiry']['full_name']}}</td>
              </tr>
              <tr>
                <th>Client's Email Address</th>
                <td>{{$details['inquiry']['inquiry_email']}}</td>
              </tr>
              <tr>
                <th>Client's Contact Number</th>
                <td>{{$details['inquiry']['phone']}}</td>
              </tr>
              <tr>
                <th>Client's Message</th>
                <td>{{$details['inquiry']['inquiry_message']}}</td>
              </tr>
            </tbody>
          </table>
        </section>
        </div>
      </div>
      </div>
      <!--   Footer     -->
        <footer>
        <center>
          <section class="email_footer">
          <p class="text-align-center mb-2">This is an auto generated email from {{config('app.name','Application Name')}}</p>
           <p class="text-align-center">Copyright &copy; <script>document.write(new Date().getFullYear())</script>  SL-UK Chamber of Commerce All Rights Reserved</p>
            </section>
        </center>
        </footer>
      <!--   footer ends     -->
    </div>
  </body>
</html>