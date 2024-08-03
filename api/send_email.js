const nodemailer = require('nodemailer');

exports.handler = async function (event, context) {
  // Parse form data from the event body
  const { name, email, subject, message } = JSON.parse(event.body);

  // Create a transporter
  let transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'fredrickmureti612@gmail.com', // Your Gmail address
      pass: 'yjdxsxvdrpruglov' // Your Gmail App Password
    }
  });

  // Setup email data
  let mailOptions = {
    from: 'fredrickmureti612@gmail.com',
    to: 'fredrickmureti612@gmail.com',
    subject: subject,
    text: `Name: ${name}\nEmail: ${email}\nMessage: ${message}`
  };

  // Send email
  try {
    let info = await transporter.sendMail(mailOptions);
    console.log('Email sent: ' + info.response);
    return {
      statusCode: 200,
      body: 'Email sent successfully!'
    };
  } catch (error) {
    console.error('Error sending email: ' + error);
    return {
      statusCode: 500,
      body: 'Failed to send email.'
    };
  }
};
