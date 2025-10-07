import tkinter as tk

def say_hello():
    label.config(text="Hello, World!")

root = tk.Tk()
root.title("Simple App")

label = tk.Label(root, text="Welcome!")
label.pack(pady=10)

button = tk.Button(root, text="Say Hello", command=say_hello)
button.pack(pady=5)

root.mainloop()