String.prototype.splice = function(start, deleteCount, newSubString) {
	return this.slice(0, start) + newSubString + this.slice(start + Math.abs(deleteCount));
}

'Hello world!'.splice(5, 0, ' beautiful') // returns 'Hello beautiful world!
