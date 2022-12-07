// no. 1
var arr = [1,2,3,4,5,6,7,8,9,10];

function fizzBuzz(array){
    for (let i = 0; i < array.length; i++) {
        if (array[i]%3 == 0) {
            array[i] = "Fizz"
        }
        else if (array[i]%5 == 0) {
            array[i] = "Buzz"
        }
    }

    console.log(array)
}

fizzBuzz(arr)

//no. 2
var arrayString = ["kodok", "kadal", "radar", "lincah"];

function isPalindrom(array) {
    for (let i = 0; i < array.length; i++) {
        var str = array[i].split('').reverse().join('');

        for (let x = 0; x < str.length; x++) {
            if (str[0] != str[str.length - 1]) {
                array[i] = false 
            }
            else {
                array[i] = true 
            }
        }
    }

    console.log(array)
}

isPalindrom(arrayString)

//no. 3
var isDuplicateArr = [1,2,3,2,5,4,4,5,9,8]

function isDuplicate(array){
    array.sort()
    var result = {}
    var countResult = 0

    array.forEach(function(x) {
        result[x] = (result[x] || 0) + 1;

        if (result[x] > 1) {
            countResult += 1
        }

    });

    console.log(countResult + " data duplicate")
}

isDuplicate(isDuplicateArr)