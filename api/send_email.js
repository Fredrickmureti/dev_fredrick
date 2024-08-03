// api/send_email.js
const nodemailer = require('nodemailer');

export default async function handler(req, res) {
  if (req.method === 'POST') {
    const { name, email, subject, message } = req.body;

    let transporter = nodemailer.createTransport({
      service: 'gmail',
      auth: {
        user: 'fredrickmureti612@gmail.com',
        pass: 'yjdxsxvdrpruglov', // Use app password if 2FA is enabled
      },
    });

    let mailOptions = {
      from: email,
      to: 'fredrickmureti612@gmail.com',
      subject: subject,
      text: `${message}\n\nFrom: ${name} <${email}>`,
    };

    try {
      await transporter.sendMail(mailOptions);
      res.status(200).json({ message: 'Mail sent successfully!' });
    } catch (error) {
      res.status(500).json({ message: 'Failed to send mail.' });
    }
  } else {
    res.setHeader('Allow', ['POST']);
    res.status(405).end(`Method ${req.method} Not Allowed`);
  }
}
