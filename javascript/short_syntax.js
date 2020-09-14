
//SELECTING ELEMENT(S)
Object.prototype.el = function(el, where = document) {
	const elems = where.querySelectorAll(el)
	return elems.length > 1 ? [...elems] : elems[0]
}

el('#element') // returns single HTML element
el('div') // returns array of elements
el('div', el('#element')) // Optional second parameter to specify where to look for the element(s).
