const Email = require("email-templates");

class ServiceEmail {
  purchaseProcess(data) {
    const email = new Email({
      message: {
        from: "contato@catalog.com",
      },
      send: true,
      transport: {
        host: process.env.MAIL_HOST,
        port: process.env.MAIL_PORT,
        ssl: false,
        tls: true,
        auth: {
          user: process.env.MAIL_USER,
          pass: process.env.MAIL_PASS,
        },
      },
    });

    email
      .send({
        template: "purchase",
        message: {
          to: data.user_email,
        },
        locals: {
          name: data.user_name,
          product: data.product_name,
          description: data.product_description,
        },
      })
      .then(console.log)
      .catch(console.error);
  }
}

module.exports = ServiceEmail;
