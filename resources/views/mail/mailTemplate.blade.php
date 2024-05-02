<!DOCTYPE html>
<html>
<head>
    <title>Account Verification</title>
</head>
<body>
    <p>Halloo <b>{{$details['name']}}</b>!!</p>
    <p>Berikut ini adalah Data Anda:</p>
    <table>
      <tr>
        <td>Name</td>
        <td>:</td>
        <td>{{$details['name']}}</td>
      </tr>
      <tr>
        <td>Website</td>
        <td>:</td>
        <td>{{$details['website']}}</td>
      </tr>
      <tr>
        <td>Register Date</td>
        <td>:</td>
        <td>{{$details['datetime']}}</td>
      </tr>
    </table>

    <center>
      <h3>Click this link to verify your account:</h3>
      <a href="{{$details['url']}}"><b style="color:blue">Verify</b></a>
      <h3>If you can't, Copy this link to your browser </h3>
      <p>{{$details['url']}}</p>
    </center>

  <p>Thank you for your registration! </p>
</body>
</html>
