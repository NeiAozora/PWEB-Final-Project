function removeTrailingZeros(number) {
    // Convert the number to a string
    let str = number.toString();

    // Check if it contains a decimal point
    if (str.indexOf('.') !== -1) {
      // Remove trailing zeros
      str = str.replace(/\.?0+$/, '');
    }

    return str;
  }


function formatPriceValue(value) {
    // Check if the value is a number and not null/undefined
    if (value == null || isNaN(value)) {
        console.error("Invalid number:", value);
        return "0.00"; // Default or fallback value
    }

    // Ensure value is a number
    value = parseFloat(value);

    // Convert the value to a fixed-point notation with two decimals
    let parts = value.toFixed(2).split(".");

    // Add commas to the integer part
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Check if the decimal part is ".00" and remove it if so
    if (parts[1] === "00") {
        return parts[0];
    }

    // Join the integer part with the decimal part
    return parts.join(".");
}
