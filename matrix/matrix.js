var minesMatrix = [
	[1,0,0,1,0],
	[0,1,1,0,1],
	[1,0,1,1,1],
	[0,1,0,0,0],
	[1,1,1,0,0]
];

var numberMatrix = [
	[0,0,0,0,0],
	[0,0,0,0,0],
	[0,0,0,0,0],
	[0,0,0,0,0],
	[0,0,0,0,0],
];

var calculateMines = function(x, y) {
	var numberOfMines = 0;
	var xStart = (x-1 >= 0 ? x-1 : 0);
	var xEnd = (x+1 > minesMatrix.length ? minesMatrix.length : x+1);
	var rows = minesMatrix.slice(xStart, xEnd + 1);
	rows.forEach(function(row, rowIdx) {
		var yStart = (y-1 >= 0 ? y-1 : 0);
		var yEnd = (y+1 > row.length ? row.length : y + 1);
		var cells = row.slice(yStart, yEnd+1);
		numberOfMines += cells.reduce(function(prev,curr){ return prev+curr; },0);
	});
	return numberOfMines;
};

minesMatrix.forEach(function(row, rowIdx) {
	row.forEach(function(cell, cellIdx) {
		if(cell === 0) {
			numberMatrix[rowIdx][cellIdx] = calculateMines(rowIdx, cellIdx);
		}
	});
});

console.log(numberMatrix);