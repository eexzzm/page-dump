// Spread operator (...) digunakan untuk mengumpulkan semua argumen yang diberikan ke dalam sebuah array.

const tambah = (...numbers) => {
    let result = 0;
    for (let num of numbers) {
      result += num;
    }
    return result;
  };
  
  const kurang = (...numbers) => {
    let result = numbers[0];
    for (let i = 1; i < numbers.length; i++) {
      result -= numbers[i];
    }
    return result;
  };
  
  const kali = (...numbers) => {
    let result = 1;
    for (let num of numbers) {
      result *= num;
    }
    return result;
  };
  
  const bagi = (...numbers) => {
    let result = numbers[0];
    for (let i = 1; i < numbers.length; i++) {
      result /= numbers[i];
    }
    return result;
  };
  
  const modulus = (...numbers) => {
    let result = numbers[0];
    for (let i = 1; i < numbers.length; i++) {
      result %= numbers[i];
    }
    return result;
  };

const kalkulator = (operator, ...numbers) => {
    switch (operator) {
      case '+':
        return tambah(...numbers);
      case '-':
        return kurang(...numbers);
      case '*':
        return kali(...numbers);
      case '/':
        return bagi(...numbers);
      case '%':
        return modulus(...numbers);
      default:
        return "Operator tidak valid!";
    }
  };