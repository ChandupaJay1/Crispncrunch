const btnSend = document.getElementById('btn-send')

async function sendMail() {
    const name = document.getElementById('name')
    const email = document.getElementById('email')
    const subject = document.getElementById('subject')
    const message = document.getElementById('message')

    const body = { name: name.value, email: email.value, subject: subject.value, message: message.value }
    const btnText = btnSend.innerHTML
    btnSend.disabled = true
    btnSend.innerHTML =  "SENDING..."
    const res = await postData('/contact/send', body)
    btnSend.disabled = false
    btnSend.innerHTML = btnText
    if (res.success) {
        alert("Message sent!\nThank you for contacting us!")
    } else {
        alert("Something went wrong!\nPlease try again or directly send an email to us!")
    }

    name.value = ""
    email.value = ""
    subject.value = ""
    message.value = ""
}

btnSend.addEventListener('click', e => {
    e.preventDefault()
    sendMail()
})
