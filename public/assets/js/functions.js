/**
 * @desc Makes a get request to the url and returns the response
 * @param {string} url url to request
 * @return {object} json response
 * @author Nipun Lakshan <nipunlakshankumara@gmail.com>
 */
async function get(url) {
    return await fetch(url, {
        method: "get",
        headers: {
            Accept: "application/json",
        }
    })
        .then(response => response.json())
        .catch(err => console.error(err))
}

/**
 * @desc Makes a post request to the url and returns the response
 * @param {string} url relative url
 * @param {object} body request body
 * @return {object} json response
 * @author Nipun Lakshan <nipunlakshankumara@gmail.com>
 */
async function post(url, body = {}) {
    return await fetch(url, {
        method: "post",
        body: JSON.stringify(body),
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
    })
        .then(response => response.json())
        .catch(err => console.log(err))
}
