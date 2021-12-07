// String splice
String.prototype.splice = function(start, deleteCount, newSubString) {
	return this.slice(0, start) + newSubString + this.slice(start + Math.abs(deleteCount));
}
'Hello world!'.splice(5, 0, ' beautiful') // returns 'Hello beautiful world!



// Built in delay of functions
Function.prototype.sleep = function(delay, ...args) {
    setTimeout(() => this(...args), delay)
}
console.log.sleep(2000, 'Hello, World!!')



//Selecting element(s)
Object.prototype.elem = function(el, where = document) {
	const elems = where.querySelectorAll(el)
	return elems.length > 1 ? [...elems] : elems[0]
}
elem('#element') // returns single HTML element
elem('div') // returns array of elements, unless there's only one instance of the element. Then it returns that one element
elem('div', elem('#element')) // Optional second parameter to specify where to look for the element(s)