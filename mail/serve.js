require('dotenv').config()

const queue = require("./messages")
const ServiceEmail = require('./mail')

const config = { durable: false, autoDelete: true }

queue.consumer("new_purchase", config, msg => {
    const srvMail = new ServiceEmail()
    const message = (JSON.parse(msg.content.toString()))
    srvMail.purchaseProcess(message)
})