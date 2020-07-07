/**
 * Returns a complete url based on current server location
 *
 * @param {string} URI
 */
function baseURL(URI = "") {
	if (typeof URI === "string") {
		let protocol = "http";
		let port = "80";
		let hostname = "localhost";
		let URIPrefix = "web-resto";
		return `${protocol}://${hostname}:${port}/${URIPrefix}/${URI}`;
	}
}
