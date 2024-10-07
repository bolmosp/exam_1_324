using System;

class Program
{
    static void Main(string[] args)
    {
        if (args.length > 0) {
            String id = args[0]; // The first argument from the command line
            // Extract the first character (first number of the ID)
            char firstChar = id[0];
            // Check if the first character is a digit
            if (Character.isDigit(firstChar)) {
                int firstDigit = Character.getNumericValue(firstChar);

                // Output message based on the first digit
                switch (firstDigit) {
                    case 1:
                        Console.WriteLine("Impuesto Alto");
                        break;
                    case 2:
                        Console.WriteLine("Impuesto Medio");
                        break;
                    case 3:
                        Console.WriteLine("Impuesto Bajo");
                        break;
                    default:
                        Console.WriteLine("Impuesto Desconocido.");
                }
            } else {
                Console.WriteLine("No se puede determinar.");
            }
        } else {
            Console.WriteLine("Error.");
        }
    }
}
