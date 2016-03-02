function findNumberOfElements(array)
{
    return array.length;
}

function findSummation(array)
{
    var sum = 0;
    for(i = 0; i < findNumberOfElements(array); i++)
    {
        sum += parseFloat(array[i]);
    }

    return sum;
}

function findMean(array)
{
    var sum = findSummation(array);
    var numberOfEle = findNumberOfElements(array);

    return sum / numberOfEle;
}

function sortArray(arr)
{
    var length = findNumberOfElements(arr);

    for (i = 0; i < length; i++)
    {
        for(j = i + 1; j < length; j++)
        {
            if(arr[i] > arr[j])
            {
                var temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
    }
    return arr;
}

function findMedian(array)
{
    array = sortArray(array);

    var j = findNumberOfElements(array) - 1;
    var i = 0;

    for(i = 0; (i != j & i + 1 != j); i++)
    {
        j--;
    }

    if(i == j)
    {
        return array[i];
    }
    else
    {
        var midPoints = [array[i], array[j]];
        return findMean(midPoints);
    }
}

function checkStorageArray(storageObject, checkVariable)
{
    for (i = 0; i < findNumberOfElements(storageObject.checkArray); i++)
    {
        if(storageObject.checkArray[i] == checkVariable)
        {
            storageObject.valueArray[i]++;
            return;
        }
    }
    storageObject.valueArray.push(1);
    storageObject.checkArray.push(parseFloat(checkVariable));
}

function findMode(array)
{
    var storageObject =
    {
        checkArray: [],
        valueArray: []
    };

    for(j = 0; j < findNumberOfElements(array); j++)
    {
        checkStorageArray(storageObject, array[j]);
    }

    var maxValue = -1;
    for(j = 0; j < findNumberOfElements(storageObject.valueArray); j++)
    {
        if(maxValue < storageObject.valueArray[j])
        {
            maxValue = storageObject.valueArray[j];
        }
    }

    var modeValues = [];
    for(j = 0; j < findNumberOfElements(storageObject.valueArray); j++)
    {
        if(storageObject.valueArray[j] == maxValue)
        {
            modeValues.push(storageObject.checkArray[j]);
        }
    }
    return modeValues;
}

function findVariance(array)
{
    //First find the sample mean

    var sampleMean = findMean(array);

    var lengthOfArray = findNumberOfElements(array);

    var total = 0;

    for(i = 0; i < lengthOfArray; i++)
    {
        var sample = array[i] - sampleMean;
        sample = sample * sample;

        total += sample;
    }

    total = total / (lengthOfArray - 1);
    return total;
}

function findStandardDeviation(array)
{
    return Math.sqrt(findVariance(array));
}