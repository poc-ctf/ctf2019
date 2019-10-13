from pcapfile import savefile


#decoding parameters:
true_val = '1'
false_val = '0'
val_index = -2 #-1 or -2
dot_time = 500 #ms


def bin_to_signs(bin_message):
	dictionary = {
	"11111": "0",
	"01111": "1",
	"00111": "2",
	"00011": "3",
	"00001": "4",
	"00000": "5",
	"10000": "6",
	"11000": "7",
	"11100": "8",
	"11110": "9",
	"01": "A",
	"1000": "B",
	"1010": "C",
	"100": "D",
	"0": "E",
	"0010" : "F",
	"110": "G",
	"0000": "H",
	"00": "I",
	"0111": "J",
	"101": "K",
	"0100": "L",
	"11": "M",
	"10": "N",
	"111": "O",
	"0110": "P",
	"1101": "Q",
	"010": "R",
	"000": "S",
	"1": "T",
	"001": "U",
	"0001": "V",
	"011": "W",
	"1001": "X",
	"1011": "Y",
	"1100": "Z",
	"10110": "(",
	"101101": ")"
	}
	message = ""
	split_bin_message = bin_message.split(" ")
	# print(split_bin_message)
	for sign in split_bin_message:
		if sign in dictionary:
			message += dictionary[sign]
			print(message)
		else:
			print("sign not in dictionary")
			print(sign)
	return message

if __name__ == "__main__":
	print("Started morsedecoder.py - decoding message from pcap file")
	try:
		testcap = open('ewspocopalypse.pcap', 'rb')
		capfile = savefile.load_savefile(testcap, verbose=True)
		bin_message = ""
		# for i in range(2,len(capfile.packets) - 1):
		# 	f_time = (capfile.packets[i+1].timestamp - capfile.packets[i].timestamp) / dot_time
		# 	print("time gap: {}".format(f_time))
		# 	val = capfile.packets[i].packet[val_index]
		# 	print("sent value: {}".format(val))
		# 	if (f_time == 1 and val == true_val):
		# 		print("*")
		# 		bin_message += '0'
		# 	elif (f_time == 3 and val == true_val):
		# 		print("-")
		# 		bin_message += '1'
		# 	elif (f_time == 1 and val == false_val):
		# 		continue
		# 	elif (f_time == 3 and val == false_val):
		# 		print(" ")
		# 		bin_message += ' '
			
		for i in range(2,len(capfile.packets) - 1):
			f_time = 0.0
			f_time = (float(capfile.packets[i+1].timestamp) + float(capfile.packets[i+1].timestamp_ms) / 1000.0) - (float(capfile.packets[i].timestamp) + float(capfile.packets[i].timestamp_ms) / 1000.0)
			f_time *= 10
			f_time = int(f_time) / 5
			# print("time gap: {}".format(f_time))
			val = capfile.packets[i].packet[val_index]
			# print("sent value: {}".format(val))
			if (f_time == 1 and val == true_val):
				print("*")
				bin_message += '0'
			elif (f_time == 3 and val == true_val):
				print("-")
				bin_message += '1'
			elif (f_time == 1 and val == false_val):
				continue
			elif (f_time == 3 and val == false_val):
				print(" ")
				bin_message += ' '

		print("bin_message: {}".format(bin_message))
		decoded_message = bin_to_signs(bin_message)
		print("decoded flag: {}".format(decoded_message))
	except Exception as e:
		print(e)
		print("Exception closed program")