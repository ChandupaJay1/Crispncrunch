/**
 * --------- Classes ---------
 */

class ContactForm {
    constructor() {
        this.name = document.querySelector('#contact-form #name')
        this.email = document.querySelector('#contact-form #email')
        this.subject = document.querySelector('#contact-form #subject')
        this.message = document.querySelector('#contact-form #message')
    }

    validateEmail() {
        const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        return Boolean(this.email?.value.match(regex))
    }

    validate() {
        const errors = {}

        if (this.name?.value.trim() === '') {
            errors.name = { isValid: false, msg: 'Name is empty' }
        }

        if (this.email?.value.trim() === '') {
            errors.email = 'Email is blank'
        } else if (!this.validateEmail()) {
            errors.email = { isValid: false, msg: 'Email not valid' }
        }

        if (this.subject?.value.trim() === '') {
            errors.subject = { isValid: false, msg: 'Subject is empty' }
        }

        if (this.message?.value.trim() === '') {
            errors.message = { isValid: false, msg: 'Message is empty' }
        }

        if (errors) this.handleErrors(errors)
        return Boolean(!errors)
    }

    async submit() {
        const res = await post(`${APP_URL}/contact/submit`, { name: this.name.value })
        if (res.success) return true
        this.handleErrors(res.errors)
        return false
    }

    handleErrors(errors) {
        console.error(errors)
    }

    clear() {
        this.name.value = ''
        this.email.value = ''
        this.subject.value = ''
        this.message.value = ''
    }

}


/**
 * --------- Functions ---------
 */
async function subscribeToNewsLetter() {
    const email = document.querySelector("#subscribe-newsletter > input");
    const result = await post(`${APP_URL}/api/newsletter/subscribe`, { email: email.value })
    if (result.success) {
        console.log(result)
        email.value = ''
    } else {
        console.error(result.msg)
    }
    alert(result.msg);
}

async function submitContactForm() {
    const form = new ContactForm()

    if (!form.validate()) return

    const success = await form.submit()
    if (success) {
        form.clear()
        alert("Thank you for contacting us")
    }
}

async function submitQuote() {
    const mobilePattern = /^(\(0\d\)\d{7}|\(02\d\)\d{6,8}|0800\s\d{5,8})$/
    const mobile = document.querySelector('#quote-form #mobile')

    if (mobilePattern.test(mobile.value)) {
        console.log('matched')
    } else {
        console.log('not matched')
    }
}


/**
 * --------- Events ---------
 */
document.getElementById('back-to-top')
    ?.addEventListener('click', () => window.location = '#')

/*
 Subscribe to newsletter
*/
document.querySelector("#subscribe-newsletter > button")
    ?.addEventListener('click', () => subscribeToNewsLetter())

document.querySelector("#subscribe-newsletter > input")
    ?.addEventListener('keyup', ev => ev.key === "Enter" && subscribeToNewsLetter())

/*
 Contact Form
*/
document.getElementById('contact-form')
    ?.addEventListener('submit', async ev => {
        ev.preventDefault()
        await submitContactForm()
    })
// document.querySelector('#contact-form #btn-submit-contact-form')
//     ?.addEventListener('click', () => submitContactForm())
//
// document.querySelectorAll('#contact-form input[type="text"], #btn-submit-contact-form')
//     ?.forEach(element => {
//         element.addEventListener('keyup', ev => ev.key === 'Enter' && submitContactForm())
//     })

document.getElementById('quote-form')
    ?.addEventListener('submit', async ev => {
        ev.preventDefault()
        await submitQuote()
    })

