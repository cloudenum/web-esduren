/**
 * Returns a complete url based on current server location
 *
 * @param {string} URI
 */
function baseURL(URI = "") {
	if (typeof URI === "string") {
		return `{base_url}${URI}`;
	}
}
