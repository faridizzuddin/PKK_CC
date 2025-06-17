# 🔍 Code Complexity Analysis with Lizard

This folder contains a simple Python script to analyze code complexity using Lizard

---

## 📁 Files Included

- `run_lizard_summary.py` — Python script that runs Lizard and extracts summary metrics from the output.

---

## ⚙️ How to Use (Windows / CMD)

### 1. Install Lizard

Open Command Prompt and run:

```bash
pip install lizard
````

> Make sure Python and `pip` are installed and added to your system PATH.

---

### 2. Edit the Script

In `run_lizard_summary.py`, change the `repo_path` variable to the full path of the project you want to analyze:

```python
repo_path = r"C:\full\path\to\your\repo"
```

---

### 3. Run the Script

Open Command Prompt in the folder where the script is located, then run:

```bash
python run_lizard_summary.py
```

You’ll see a summarized table of code complexity metrics at the end of the output.

