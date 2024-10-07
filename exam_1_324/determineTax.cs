using System;

class Program
{
    static void Main(string[] args)
    {
        if (args.Length != 0){
            String id = args[0]; // The first argument from the command line
            // Extract the first character (first number of the ID)
            char firstChar = id[0];
            if (firstChar == '1'){
                Console.WriteLine("Impuesto Alto.");
            } else if (firstChar == '2'){
                Console.WriteLine("Impuesto Medio.");
            } else if (firstChar == '3'){
                Console.WriteLine("Impuesto Bajo.");
            } else {
                Console.WriteLine("Impuesto Desconocido.");
            }
        }
    }
}
